
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->unsignedBigInteger('product_id');
            $table->foreign("product_id")->references("id")->on("products");
            $table->unsignedBigInteger('client_id');
            $table->foreign("client_id")->references("id")->on("clients");
            $table->unsignedBigInteger("order_status_id"); // 1 - aberto, 2 - pago, 3 - cancelado
            $table->foreign("order_status_id")->references("id")->on("order_statuses");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
