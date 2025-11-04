<?php

namespace App\Livewire\Product;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuyNowButton extends Component
{
    public Product $product;
    public $selectedQuantity = 1; // <-- NEW PROPERTY: Default to 1

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    protected function rules()
    {
        return [
            // Validate that the quantity is at least 1 and not more than the available stock
            'selectedQuantity' => 'required|integer|min:1|max:' . $this->product->quantity,
        ];
    }

    public function buyNow()
    {
        // 1. Validate the selected quantity against the available stock
        $this->validate();

        // 2. Perform both operations (Order Creation and Stock Decrement) in a transaction
        DB::transaction(function () {
            // A. Create the Order
            // NOTE: The order model still only records the total_paid price for the full order.
            // For a complex cart, we'd need a separate OrderItem model to record the quantity bought.
            Order::create([
                'user_id' => Auth::id(),
                'product_id' => $this->product->id,
                'total_paid' => $this->product->price * $this->selectedQuantity, // <-- CALCULATE TOTAL PRICE
                'status' => 'paid',
            ]);

            // B. Decrement the Product Quantity by the selected amount
            $this->product->decrement('quantity', $this->selectedQuantity);

            // C. Refresh the product data to update the view (e.g., disable the button/update stock display)
            $this->product->refresh();
        });

        // 3. Reset quantity and redirect
        $this->selectedQuantity = 1;
        session()->flash('order_success', 'Order for ' . $this->selectedQuantity . ' unit(s) placed successfully! Total paid: $' . number_format($this->product->price * $this->selectedQuantity, 2));
        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.product.buy-now-button');
    }
}
