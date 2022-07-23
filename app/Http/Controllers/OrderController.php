<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(["client", "product"])->orderBy("id")->paginate(20);
        return view("order.index", compact("orders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::orderBy("name")->get();
        $products = Product::orderBy("title")->where("stock", ">", "0")->get();
        return view("order.create", compact("clients", "products"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStoreRequest $request)
    {
        // Sei que a lógica disso ficou errada, o correto seria descontar o estoque do produto quando o pedido fosse pago, porém a lógica de pagamento não está definida pra ativar a trigger do "débito" no estoque, então deixei assim.

        $orderWithSelectedProduct = Order::where("product_id",  $request->product_id)->get();
        $stockOfProductsSelected = Product::find($request->product_id)->value("stock");
        $productsAvailableAfterPurchase = 1;

        if (count($orderWithSelectedProduct) > 0 && $stockOfProductsSelected !== 0) {
            $selectedProductsPurchased = $orderWithSelectedProduct->pluck("quantity")->sum();

            $productsAvailableAfterPurchase =  $stockOfProductsSelected - $selectedProductsPurchased;
        }
        if ($productsAvailableAfterPurchase <= 0 || $stockOfProductsSelected === 0) {
            return redirect("pedidos")->withErrors("Quantidade de produtos insuficiente no estoque.");
        };
        Order::create($request->validated());

        return redirect("pedidos")->with("success", "Pedido cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $orderStatuses = OrderStatus::get();
        return view("order.edit", compact("order", "orderStatuses"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());

        return redirect("/pedidos")->with("success", "Pedido atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect("pedidos")->with("success", "Produto excluído com sucesso!");
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $orders = Order::filter($request->search)->paginate(20);

        return view("order.index", compact("orders", "filters"));
    }
}
