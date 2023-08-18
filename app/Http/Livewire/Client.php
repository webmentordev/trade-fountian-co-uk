<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class Client extends Component
{
    public function render()
    {
        return view('livewire.client', [
            'orders' => Cart::where('user_id', auth()->user()->id)->get(),
            'completed' => Cart::where('user_id', auth()->user()->id)->where('status', 'completed')->sum('total'),
            'pending' => Cart::where('user_id', auth()->user()->id)->where('status', 'pending')->sum('total'),
            'cancelled' => Cart::where('user_id', auth()->user()->id)->where('status', 'cancelled')->sum('total')
        ]);
    }
}