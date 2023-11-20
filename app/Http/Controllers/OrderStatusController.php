<?php

namespace App\Http\Controllers;

use App\Mail\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class OrderStatusController extends Controller
{
    public function cancel($cart){
        $results = Cart::where('checkout_id', $cart)->get();
        
        foreach ($results as $item) {
            if ($item->status == 'pending') {
                $item->update(['status' => 'cancelled', 'shipping' => 'cancelled']);
            } else {
                abort(500, 'Internal Server Error!');
            }
        }
        Http::post(config('app.discord'), [
            'content' => "Order id: ". $item->order_id. " has been cancelled\n===================\n\n"
        ]);
        return view('orders.cancel');
    }

    public function success($cart){
        $results = Cart::where('checkout_id', $cart)->with('address')->get();
        foreach ($results as $item) {
            if ($item->status == 'pending') {
                $item->update(['status' => 'completed']);
            } else {
                abort(500, 'Internal Server Error!');
            }
        }
        Mail::to($results[0]->address->email)->send(new Order($results[0]->order_id, $results));
        Mail::to(config('app.email'))->send(new Order($results[0]->order_id, $results));
        Http::post(config('app.discord'), [
            'content' => "Order id: ". $item->order_id. " has been completed\n===================\n\n"
        ]);
        return view('orders.success', [
            'order_id' => $item->order_id
        ]);
    }
}