<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.home', [
            'products' => Product::latest()->where('is_active', true)->paginate(20)
        ]);
    }
}
