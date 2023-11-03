<?php

namespace App\Http\Livewire\Products;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Cookie;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;

class SingleProduct extends Component
{
    public $product, $quantity = 1;

    protected $rules = [
        'quantity' => 'required|numeric|min:1|max:20'
    ];

    public function mount(Product $product){
        SEOMeta::setTitle($product->short_name);
        SEOMeta::setDescription($product->seo);
        SEOMeta::setRobots("index, follow");
        SEOMeta::addMeta("apple-mobile-web-app-title", "Trade Fountain");
        SEOMeta::addMeta("application-name", "Trade Fountain");


        OpenGraph::setTitle($product->short_name);
        OpenGraph::setDescription($product->seo);
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");
        OpenGraph::addImage(config('app.url').'/storage/'.$product->image);

        TwitterCard::setTitle($product->short_name);
        TwitterCard::setSite('@tradefountainuk');
        TwitterCard::setImage(config('app.url').'/storage/'.$product->image);

        JsonLd::setTitle($product->short_name);
        JsonLd::setDescription($product->seo);
        JsonLd::setType("WebSite");
        JsonLd::addImage(config('app.url').'/storage/'.$product->image);
    }

    public function render()
    {
        return view('livewire.products.single-product')->layout('layouts.livewire');
    }

    public function updated(){
        $this->validate();
    }

    public function add_to_cart(){
        $cartItems = session()->get('cart');
        $cartItems[$this->product->slug] = [
            'quantity' => $this->quantity,
            'price' => $this->product->price,
            'name' => $this->product->name,
            'image' => config('app.url').'/storage/'.$this->product->image,
        ];
        session()->put('cart', $cartItems);
        session()->flash('success', 'Product has been added to the cart!');
    }
}