<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Stripe\StripeClient;

class ProductsCreate extends Component
{
    use WithFileUploads;

    public $name, $short, $price = 0.0, $description, $body, $image;

    protected $rules = [
        'name' => 'required|max:255|unique:products',
        'short' => 'required|max:255|unique:products,short_name',
        'price' => 'required|numeric|min:1',
        'description' => 'required|max:500',
        'body' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg,webp'
    ];
    
    public function render()
    {
        return view('livewire.products.products-create')->layout('layouts.app');
    }

    public function updated(){
        $this->validate();
    }

    public function create(){
        $this->validate();
        
        $stripe = new StripeClient(config('app.stripe'));

        $product = $stripe->products->create([
            'name' => $this->name
        ]);

        $price = $stripe->prices->create([
            'unit_amount' => $this->price * 100,
            'currency' => 'USD',
            'product' => $product['id'],
        ]);

        Product::create([
            'name' => $this->name,
            'short_name' => $this->short,
            'slug' => str_replace(' ', '-', strtolower($this->name)).'-'.rand(1, 9999999),
            'price' => $this->price,
            'image' => $this->image->store('product_images', 'public_disk'),
            'description' => $this->description,
            'body' => $this->body,
            'price_id' => $price['id'],
            'stripe_id' => $product['id']
        ]);

        $this->reset();
        session()->flash('success', 'Product has been created!');
    }
}