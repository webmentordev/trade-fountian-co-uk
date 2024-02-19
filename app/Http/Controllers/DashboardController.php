<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Mail\Shipped;
use App\Mail\Canceled;
use App\Mail\Refunded;
use App\Mail\Completed;
use App\Mail\Processed;
use App\Mail\Refunding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard', [
            'orders' => Cart::latest()->paginate(100)
        ]);
    }

    public function update(Request $request, $cart){
        $this->validate($request, [
            'status' => 'required'
        ]);

        $cart_info = Cart::where('order_id', $cart)->with('address')->first();

        if($request->status == "processed"){
            Mail::to($cart_info->address->email)->send(new Processed($cart_info->order_id, $cart_info->address->name));
        }elseif($request->status == "completed"){
            Mail::to($cart_info->address->email)->send(new Completed($cart_info->order_id, $cart_info->address->name));
        }elseif($request->status == "canceled"){
            Mail::to($cart_info->address->email)->send(new Canceled($cart_info->order_id, $cart_info->address->name));
        }elseif($request->status == "refunding"){
            Mail::to($cart_info->address->email)->send(new Refunding($cart_info->order_id, $cart_info->address->name));
        }elseif($request->status == "refunded"){
            Mail::to($cart_info->address->email)->send(new Refunded($cart_info->order_id, $cart_info->address->name));
        }

        /* elseif($request->status == "transit"){
            Mail::to($cart_info->address->email)->send(new Shipped($cart_info->order_id, $cart_info->address->name));
        }*/
        
        $cart = Cart::where('order_id', $cart)->update(['shipping' => $request->status]);

        return back();
    }
}