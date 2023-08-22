<?php

namespace App\Http\Livewire\Products;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsListing extends Component
{
    use WithPagination;

    protected $paginationTheme = "tailwind";

    public function render()
    {
        return view('livewire.products.products-listing', [
            'products' => Product::latest()->paginate(30)
        ])->layout('layouts.app');
    }

    public function updateStatus(Product $product, $status){
        $product->is_active = $status;
        $product->save();
        Cart::where('product_id', $product->id)->where('status', 'pending')->delete();
    }
}
