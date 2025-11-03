<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BuyNowButton extends Component
{
    public Product $product;

    /**
     * Called when component is initialized.
     */
    public function mount(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Handles the purchase action.
     */
    public function buyNow()
    {
        // 1. Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Simple validation: prevent buying your own product
        if (Auth::id() === $this->product->user_id) {
            session()->flash('error', 'You cannot buy your own product.');
            return;
        }

        // 3. Create a basic order record
        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $this->product->id,
            'total_paid' => $this->product->price,
            'status' => 'paid', // Simplified: assumes instant payment success
        ]);

        // 4. Redirect to dashboard with success message
        session()->flash('order_success', 'Purchase successful! Your order has been placed.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.product.buy-now-button');
    }
}
