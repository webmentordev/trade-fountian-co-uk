<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product, $quantity = 1;

    protected $rules = [
        'quantity' => 'required|numeric|min:1|max:20'
    ];

    public function mount($slug){
        $result = Product::where('slug', $slug)->first();
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
}