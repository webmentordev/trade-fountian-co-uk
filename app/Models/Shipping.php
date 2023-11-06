<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'name',
        'email',
        'number',
        'address'
    ];

    public function order(){
        return $this->belongsTo(Cart::class, 'order_id', 'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
