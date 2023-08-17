<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'quantity',
        'total',
        'checkout_id',
        'status'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
