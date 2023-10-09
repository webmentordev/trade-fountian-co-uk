<?php

namespace App\Models;

use App\Models\Gellery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'description',
        'body',
        'is_active'
    ];

    public function images(){
        return $this->hasMany(Gellery::class)->where('is_active', true);
    }
}