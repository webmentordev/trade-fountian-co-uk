<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Stripe\StripeClient;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class ProductController extends Controller
{
    public function index(){
        return view('create-product');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|max:255|unique:products',
            'short' => 'required|max:255|unique:products,short_name',
            'slug' => 'required|max:255',
            'seo' => 'required',
            'price' => 'required|numeric|min:1',
            'description' => 'required|max:500',
            'body' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp'
        ]);

        $stripe = new StripeClient(config('app.stripe'));

        $imageLink = $request->image->store('product_images', 'public_disk');

        $product = $stripe->products->create([
            'name' => $request->name,
            'images' => [
                config('app.url').'/storage/'.$imageLink
            ]
        ]);

        Product::create([
            'name' => $request->name,
            'short_name' => $request->short,
            'slug' => str_replace(' ', '-', strtolower($request->slug)).'-'.rand(1, 9999999),
            'price' => $request->price,
            'image' => $imageLink,
            'description' => $request->description,
            'seo' => $request->seo,
            'body' => $request->body,
            'stripe_id' => $product['id']
        ]);

        return back()->with('success', 'Product has been created!');
    }


    public function show(){
        SEOMeta::setTitle("Trade Fountain Products Listing");
        SEOMeta::setDescription("List of all Trade fountain's multicoloured and multi purposed napkins and tea towerds in UK");
        SEOMeta::setRobots("index, follow");
        SEOMeta::addMeta("apple-mobile-web-app-title", "Trade Fountain");
        SEOMeta::addMeta("application-name", "Trade Fountain");


        OpenGraph::setTitle("Trade Fountain Products Listing");
        OpenGraph::setDescription("List of all Trade fountain's multicoloured and multi purposed napkins and tea towerds in UK");
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");

        TwitterCard::setTitle("Trade Fountain Products Listing");
        TwitterCard::setSite('@tradefountainuk');

        JsonLd::setTitle("Trade Fountain Products Listing");
        JsonLd::setDescription("List of all Trade fountain's multicoloured and multi purposed napkins and tea towerds in UK");
        JsonLd::setType("WebSite");
        
        return view('products', [
            'products' => Product::latest()->where('is_active', true)->get()
        ]);
    }


    public function search(Request $request){
        $this->validate($request, [
            'search' => 'required'
        ]);

        SEOMeta::setTitle("Search Trade Fountain Products");
        SEOMeta::setDescription("Search of all Trade fountain's multicoloured and multi purposed napkins and tea towerds in UK");
        SEOMeta::setRobots("index, follow");
        SEOMeta::addMeta("apple-mobile-web-app-title", "Trade Fountain");
        SEOMeta::addMeta("application-name", "Trade Fountain");


        OpenGraph::setTitle("Search Trade Fountain Products");
        OpenGraph::setDescription("Search of all Trade fountain's multicoloured and multi purposed napkins and tea towerds in UK");
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");

        TwitterCard::setTitle("Search Trade Fountain Products");
        TwitterCard::setSite('@tradefountainuk');

        JsonLd::setTitle("Search Trade Fountain Products");
        JsonLd::setDescription("Search of all Trade fountain's multicoloured and multi purposed napkins and tea towerds in UK");

        JsonLd::setType("WebSite");
        return view('products', [
            'products' => Product::latest()->where('is_active', true)->where('name', "LIKE", '%'.$request->search.'%')->get()
        ]);
    }


    public function update(Product $product){
        return view('update-product', [
            'product' => $product
        ]);
    }

    public function update_product(Request $request, Product $product){
        $this->validate($request, [
            'name' => 'required|max:255',
            'short' => 'required|max:255',
            'slug' => 'required|max:255',
            'seo' => 'required',
            'price' => 'required|numeric|min:1',
            'description' => 'required|max:500',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp'
        ]);

        $imageLink = null;
        
        if($request->hasFile('image')){
            $imageLink = $request->image->store('product_images', 'public_disk');
        }

        if($request->name != $product->name){
            $stripe = new StripeClient(config('app.stripe'));
            $stripe->products->update(
                $product->stripe_id,
                ['name' => $request->name]
            );
        }
        $array = [
            'name' => $request->name,
            'short_name' => $request->short,
            'slug' => $request->slug,
            'price' => $request->price,
            'image' => $imageLink,
            'description' => $request->description,
            'seo' => $request->seo,
            'body' => $request->body
        ];
        
        $product->update(array_filter($array));
        $product->save();
        
        return back()->with('success', 'Product has been updated!');
    }
}
