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
        'seo',
        'price',
        'image',
        'stripe_id',
        'description',
        'body',
        'is_active',
        'is_featured'
    ];

    public function images(){
        return $this->hasMany(Gellery::class)->where('is_active', true);
    }
}