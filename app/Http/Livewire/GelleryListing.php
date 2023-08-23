<?php

namespace App\Http\Livewire;

use App\Models\Gellery;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class GelleryListing extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $images, $product;

    protected $rules = [
        'images' => 'required',
        'product' => 'required|numeric'
    ];

    public function render()
    {
        return view('livewire.gellery-listing', [
            'gellery' => Gellery::latest()->paginate(20),
            'products' => Product::latest()->get()
        ])->layout('layouts.app');
    }

    public function create(){
        $this->validate();

        foreach ($this->images as $image) {
            Gellery::create([
                'url' => $image->store('gellery_images', 'public_disk'),
                'product_id' => $this->product,
            ]);
        }
        session()->flash('success', 'Images uploaded successfully.'); 
    }

    public function updateStatus(Gellery $gellery, $status){
        $gellery->is_active = $status;
        $gellery->save();
    }
}
