<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function cancel($cart){
        $results = Cart::where('checkout_id', $cart)->get();
        foreach ($results as $item) {
            if ($item->status == 'pending') {
                $item->update(['status' => 'cancelled']);
            } else {
                abort(500, 'Internal Server Error!');
            }
        }
        return view('orders.cancel');
    }

    public function success($cart){
        $results = Cart::where('checkout_id', $cart)->get();
        foreach ($results as $item) {
            if ($item->status == 'pending') {
                $item->update(['status' => 'completed']);
            } else {
                abort(500, 'Internal Server Error!');
            }
        }
        return view('orders.success', [
            'order_id' => $item->order_id
        ]);
    }
}