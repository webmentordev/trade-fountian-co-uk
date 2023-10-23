<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Shipping;
use Stripe\StripeClient;

use Illuminate\Support\Facades\Http;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class CartArea extends Component
{
    public $name, $email, $address, $number;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'address' => 'required',
        'number' => 'required|numeric',
    ];

    public function render()
    {
        SEOMeta::setTitle("Cart");
        SEOMeta::setRobots("index, follow");
        SEOMeta::addMeta("apple-mobile-web-app-title", "Trade Fountain");
        SEOMeta::addMeta("application-name", "Trade Fountain");


        OpenGraph::setTitle("Cart");
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");

        TwitterCard::setTitle("Cart");
        TwitterCard::setSite('@tradefountainuk');
        JsonLd::setTitle("Cart");
        JsonLd::setType("WebSite");

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


    public function remove($slug){
        $product = Product::where('slug', $slug)->first();
        if($product){
            Cart::where('product_id', $product->id)->delete();
        }else{
            abort(404, 'Not Found!');
        }
    }

    public function empty_cart(){
        Cart::where('user_id', auth()->user()->id)->where('status', 'pending')->delete();
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

    public function randomCheckoutGenerator() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 120; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public function checkout(){
        $this->validate();
        $orders = Cart::where('user_id', auth()->user()->id)->where('status', 'pending')->get();

        if(count($orders) > 0){
            $stripe = new StripeClient(config('app.stripe'));

            $order_id = $this->randomStringGenerator();
            $checkout_id = $this->randomCheckoutGenerator();
            Cart::where('user_id', auth()->user()->id)->where('status', 'pending')->update([
                'order_id' => $order_id,
                'checkout_id' => $checkout_id
            ]);

            foreach($orders as $order){
                $array[] = [
                    'price_data' => [
                            "product" => $order->product->stripe_id,
                            "currency" => 'GBP',
                            "unit_amount" =>  $order->total * 100,
                        ], 
                    'quantity' => $order->quantity
                ];
            }

            $checkout = $stripe->checkout->sessions->create([
                'success_url' => config('app.url').'/success/'.$checkout_id,
                'cancel_url' => config('app.url').'/cancel/'.$checkout_id,
                'currency' => "GBP",
                'billing_address_collection' => 'required',
                'expires_at' => Carbon::now()->addMinutes(60)->timestamp,
                'line_items' => $array,
                'mode' => 'payment'
            ]);

            Shipping::create([
                'name' => $this->name,
                'user_id' => auth()->user()->id,
                'order_id' => $order_id,
                'email' => $this->email,
                'number' => $this->number,
                'address' => $this->address
            ]);

            Http::post(config('app.discord'), [
                'content' => "Order has been placed under id: ". $order_id. "\n===================\n"
            ]);

            return redirect($checkout['url']);
        }else{
            abort(500, 'Not Found!');
        }
    }
}