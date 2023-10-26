<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.home', [
            'napkins' => Product::latest()->where('is_active', true)->where('name', 'LIKE', '%napkin%')->limit(3)->get(),
            'towels' => Product::latest()->where('is_active', true)->where('name', 'LIKE', '%towel%')->limit(3)->get(),
            'reviews' => Review::latest()->limit(4)->get(),
        ]);
    }
}