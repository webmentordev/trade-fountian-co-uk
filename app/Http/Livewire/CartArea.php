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
use Illuminate\Http\Request;

class CartArea extends Component
{
    public $name, $email, $address, $number, $products, $total_price = 0;

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

        
        $products = session()->get('cart');
        if($products != null){
            $this->products = $products;
            $this->total_price = 0;
            foreach($products as $product){
                $this->total_price += ($product['price'] * $product['quantity']);
            }
        }else{
            $this->products = [];
        }

        return view('livewire.cart-area');
    }

    public function remove($index){
        unset($this->products[$index]);
        $this->products = array_values($this->products);
        session()->put('cart', $this->products);
        $this->emit('recheck');
    }
    
    public function empty_cart(){
        session(['cart' => []]);
        $this->emit('recheck');
    }

    public function randomStringGenerator() {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
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

    public function increment($slug){
        $quantity = $this->products[$slug]['quantity'];
        $new_quantity = $quantity + 1;
        if($new_quantity <= 20){
            $this->products[$slug]['quantity'] = $quantity + 1;
            session()->put('cart', $this->products);
        }
    }

    public function decrement($slug){
        $quantity = $this->products[$slug]['quantity'];
        $new_quantity = $quantity - 1;
        if($new_quantity != 0){
            $this->products[$slug]['quantity'] = $new_quantity;
            session()->put('cart', $this->products);
        }
    }

    public function checkout(){
        $this->validate();
        if(count($this->products)){
            $stripe = new StripeClient(config('app.stripe'));
            $order_id = $this->randomStringGenerator();
            $checkout_id = $this->randomCheckoutGenerator();

            foreach($this->products as $order){
                $product = Product::where('slug', $order['slug'])->first();
                Cart::create([
                    'product_id' => $product->id,
                    'order_id' => $order_id,
                    'quantity' => $order['quantity'],
                    'total' => $product->price * $order['quantity'],
                    'checkout_id' => $checkout_id
                ]);
                $array[] = [
                    'price_data' => [
                            "product" => $product->stripe_id,
                            "currency" => 'GBP',
                            "unit_amount" =>  $product->price * 100,
                        ],
                    'quantity' => $order['quantity']
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
                'order_id' => $order_id,
                'email' => $this->email,
                'number' => $this->number,
                'address' => $this->address
            ]);

            Http::post(config('app.discord'), [
                'content' => "Order has been placed under id: ". $order_id. "\n===================\n"
            ]);
            session(['cart' => []]);
            return redirect($checkout['url']);
        }else{
            abort(500, 'Not Found!');
        }
    }
}