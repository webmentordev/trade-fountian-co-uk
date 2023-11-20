<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

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
        $cart = Cart::where('order_id', $cart)->update(['shipping' => $request->status]);
        return back();
    }
}