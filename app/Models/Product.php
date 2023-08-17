<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'slug',
        'price',
        'image',
        'stripe_id',
        'price_id',
        'description',
        'body',
        'is_active'
    ];
}