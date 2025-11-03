<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        return view('livewire.product.product-list', [
            'products' => Product::latest()->get(),
        ])->layout('components.layouts.app-layout'); // Ensure it uses the correct layout
    }
}
