<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnCallback;

class TrackController extends Controller
{
    public function index(){
        return view('tracking', [
            'order' => null
        ]);
    }

    public function show(Request $request){
        $order = Cart::where('order_id', $request->order_id)->first();
        return view('tracking', [
            'order' => $order
        ]);
    }
}
