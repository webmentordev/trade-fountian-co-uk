<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Stripe\StripeClient;
use Illuminate\Http\Request;

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
}
