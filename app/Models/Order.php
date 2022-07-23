<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'product_id',
        'client_id',
        'order_status_id'
    ];

    protected  $appends = ["client_name", "product_title", "created_at_for_humans", "status_title"];

    public function getStatusTitleAttribute()
    {
        return OrderStatus::where("id", $this->order_status_id)->first()->value("title");
    }

    public function getCreatedAtForHumansAttribute()
    {
        $dateCreated = $this->created_at;
        return $dateCreated->format("d/M/Y") . " às " . $dateCreated->format("H:i");
    }

    public function getClientNameAttribute()
    {
        return $this->client->name;
    }

    public function getProductTitleAttribute()
    {
        return $this->product->title;
    }

    public function client()
    {
        return $this->hasOne(Client::class, "id", "client_id")->withTrashed();
    }
    public function product()
    {
        return $this->hasOne(Product::class, "id", "product_id")->withTrashed();
    }

    public function status()
    {
        return $this->hasOne(OrderStatus::class, "id", "order_status_id");
    }

    public static function filter($search)
    {
        return Self::with(["client", "product"])
            ->whereHas("client", function ($query) use ($search) {
                return $query->where("name", "LIKE", "%{$search}%");
            })
            ->orWhereHas("product", function ($query) use ($search) {
                return $query->where("title", "LIKE", "%{$search}%");
            })
            ->orderBy("id");
    }
}
