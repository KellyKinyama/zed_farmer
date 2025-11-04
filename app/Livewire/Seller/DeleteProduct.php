<?php

namespace App\Livewire\Seller;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DeleteProduct extends Component
{
    public Product $product;

    /**
     * Deletes the product and all associated media (images).
     */
    public function deleteProduct()
    {
        // Security check: Ensure the logged-in user owns the product
        if (Auth::id() !== $this->product->user_id) {
            session()->flash('error', 'You are not authorized to delete this product.');
            return redirect()->to(route('dashboard'));
        }

        // 1. Delete all associated media (Spatie helper handles this cleanup)
        $this->product->clearMediaCollection('images');

        // 2. Delete the product itself
        $this->product->delete();

        // 3. Redirect back to the dashboard with a success message
        session()->flash('message', 'Product listing successfully deleted.');
        return redirect()->to(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.seller.delete-product');
    }
}
