<?php

namespace App\Livewire\Seller;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $title = '';
    public $description = '';
    public $price = 0.00;
    public $quantity = 1; // <-- NEW PROPERTY
    public $image;

    protected $rules = [
        'title' => 'required|string|min:5|max:100',
        'description' => 'required|string|min:10',
        'price' => 'required|numeric|min:0.01',
        'quantity' => 'required|integer|min:1', // <-- NEW RULE
        'image' => 'required|image|max:1024',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveProduct()
    {
        $this->validate();

        $product = Product::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity, // <-- SAVING THE NEW FIELD
        ]);

        $product->addMedia($this->image->getRealPath())
                ->usingFileName($this->image->hashName())
                ->toMediaCollection('images');

        $this->reset(['title', 'description', 'price', 'quantity', 'image']);

        session()->flash('message', 'Product listing created successfully and image uploaded!');

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.seller.create-product')
            ->layout('components.layouts.app-layout');
    }
}