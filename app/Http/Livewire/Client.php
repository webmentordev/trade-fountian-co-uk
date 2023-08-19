<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class Client extends Component
{

    public $orders;

    public function mount(){
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