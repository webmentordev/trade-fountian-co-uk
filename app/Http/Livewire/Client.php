<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class Client extends Component
{

    public $orders;

    public function mount(){
        SEOMeta::setTitle("Client Area");
        SEOMeta::setRobots("index, follow");
        SEOMeta::addMeta("apple-mobile-web-app-title", "Trade Fountain");
        SEOMeta::addMeta("application-name", "Trade Fountain");


        OpenGraph::setTitle("Client Area");
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");

        TwitterCard::setTitle("Client Area");
        TwitterCard::setSite('@tradefountainuk');
        JsonLd::setTitle("Client Area");
        JsonLd::setType("WebSite");
        
        $this->orders = Cart::where('user_id', auth()->user()->id)->latest()->get();
    }

    public function render()
    {
        return view('livewire.client', [
            'completed' => Cart::where('user_id', auth()->user()->id)->where('status', 'completed')->sum('total'),
            'pending' => Cart::where('user_id', auth()->user()->id)->where('status', 'pending')->sum('total'),
            'cancelled' => Cart::where('user_id', auth()->user()->id)->where('status', 'cancelled')->sum('total')
        ]);
    }

    public function filter($filter){
        if($filter == "all"){
            $this->orders = Cart::where('user_id', auth()->user()->id)->latest()->get();
        }else{
            $this->orders = Cart::where('user_id', auth()->user()->id)->where('status', $filter)->latest()->get();
        }
    }
}