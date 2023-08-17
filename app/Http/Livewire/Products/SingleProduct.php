<?php

namespace App\Http\Livewire\Products;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SingleProduct extends Component
{
    public $product, $quantity = 1;

    protected $rules = [
        'quantity' => 'required|numeric|min:1|max:20'
    ];

    public function mount($slug){
        $result = Product::where('slug', $slug)->where('is_active', true)->first();
        if($result){
            $this->product = $result;
        }else{
            abort(404, 'Not Found!');
        }
    }

    public function render()
    {
        return view('livewire.products.single-product')->layout('layouts.livewire');
    }

    public function updated(){
        $this->validate();
    }

    public function randomStringGenerator() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 20; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }
    
    public function add_to_cart(){
        $result = Cart::where('product_id', $this->product->id)->first();
        if(!Auth::check()){
            return redirect()->route('login');
        }
        if($result){
            if(($result->quantity + $this->quantity) <= 20){
                $new_Quantity = $result->quantity + $this->quantity;
                $result->total = $new_Quantity * $this->product->price;
                $result->quantity = $new_Quantity;
                $result->save();
                session()->flash('success', 'Product has been added to the cart!');
            }else{
                $this->addError('quantity', 'Product cart size exceeded!');
                return;
            }
        }else{
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $this->product->id,
                'quantity' => $this->quantity,
                'total' => $this->product->price * $this->quantity
            ]);
            session()->flash('success', 'Product has been added to the cart!');
        }
    }
}