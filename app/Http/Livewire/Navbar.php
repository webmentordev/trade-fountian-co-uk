<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $products_count = 0;
    protected $listeners = ['recheck' => 'recheck'];


    public function mount(){
        $products = session()->get('cart');
        $this->products_count = count($products);
    }

    public function render()
    {
        return view('livewire.navbar');
    }

    public function recheck(){
        $products = session()->get('cart');
        $this->products_count = count($products);
    }
}
