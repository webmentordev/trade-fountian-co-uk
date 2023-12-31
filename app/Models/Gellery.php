<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gellery extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'url',
        'is_active'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
