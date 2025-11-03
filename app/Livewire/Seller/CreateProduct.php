<?php


// app/Livewire/Seller/CreateProduct.php
namespace App\Livewire\Seller;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateProduct extends Component
{
    public $title = '';
    public $description = '';
    public $price = 0.00;

    protected $rules = [
        'title' => 'required|string|min:5|max:100',
        'description' => 'required|string|min:10',
        'price' => 'required|numeric|min:0.01',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveProduct()
    {
        // 1. Validate the input fields
        $this->validate();

        // 2. Create the product in the database
        Product::create([
            'user_id' => Auth::id(), // Use the currently authenticated seller's ID
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        // 3. Reset form and redirect
        $this->reset(['title', 'description', 'price']);

        session()->flash('message', 'Product listing created successfully!');

        return redirect()->to('/dashboard'); // Or wherever you want to redirect
    }

    public function render()
    {
        return view('livewire.seller.create-product')->layout('components.layouts.app-layout');
    }
}