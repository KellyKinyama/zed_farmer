<?php

namespace App\Livewire\Buyer;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderHistory extends Component
{
    /**
     * Renders the view and fetches all orders for the current user.
     */
    public function render()
    {
        return view('livewire.buyer.order-history', [
            'orders' => Order::with('product') // Eager load product details
                             ->where('user_id', Auth::id())
                             ->latest()
                             ->get(),
        ])->layout('components.layouts.app-layout');
    }
}