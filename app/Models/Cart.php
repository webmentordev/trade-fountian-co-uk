<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'total',
        'checkout_id',
        'status',
        'shipping'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function address(){
        return $this->hasOne(Shipping::class, 'order_id', 'order_id');
    }
}
