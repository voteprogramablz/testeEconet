<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'stock',
        "barCode"
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $appends = ["price_formated"];

    public function getPriceFormatedAttribute() {
        return number_format($this->price,2,",",".");
    }
}
