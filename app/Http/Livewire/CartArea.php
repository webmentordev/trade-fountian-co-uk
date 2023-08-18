<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class CartArea extends Component
{
    public $name, $email, $address, $number;

    public function render()
    {
        return view('livewire.cart-area', [
            'orders' => Cart::where('user_id', auth()->user()->id)->where('status', 'pending')->get(),
            'total' => Cart::where('user_id', auth()->user()->id)->where('status', 'pending')->sum('total')
        ]);
    }

    public function increment($slug){
        $result = Product::where('slug', $slug)->first();
        if($result){
            $order = Cart::where('product_id', $result->id)->where('user_id', auth()->user()->id)->where('status', 'pending')->first();
            if($order->quantity < 20){
                $new_quantity = $order->quantity + 1;
                $order->quantity = $new_quantity;
                $order->total = $new_quantity * $result->price;
                $order->save();
            }else{
                $this->addError('quantity', 'Quantity has exceeded for the product!');
            }
        }else{
            abort(404, 'Not Found!');
        }
    }

    public function decrement($slug){
        $result = Product::where('slug', $slug)->first();
        if($result){
            $order = Cart::where('product_id', $result->id)->where('user_id', auth()->user()->id)->where('status', 'pending')->first();
            if($order->quantity > 0){
                $new_quantity = $order->quantity - 1;
                $order->quantity = $new_quantity;
                $order->total = $new_quantity * $result->price;
                $order->save();
            }else{
                $this->addError('quantity', 'Quantity has to be One or more!');
            }
        }else{
            abort(404, 'Not Found!');
        }
    }
}