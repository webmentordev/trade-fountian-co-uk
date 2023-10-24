<?php

namespace App\Http\Livewire\Products;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

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
        $result = Cart::where('product_id', $this->product->id)->where('status', 'pending')->first();
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