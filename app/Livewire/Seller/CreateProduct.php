<?php

namespace App\Livewire\Seller;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads; // <-- NEW TRAIT
use Illuminate\Support\Facades\Auth;

class CreateProduct extends Component
{
    use WithFileUploads; // <-- REQUIRED FOR FILE UPLOADS

    public $title = '';
    public $description = '';
    public $price = 0.00;
    public $image; // <-- NEW PROPERTY TO HOLD THE UPLOADED FILE

    protected $rules = [
        'title' => 'required|string|min:5|max:100',
        'description' => 'required|string|min:10',
        'price' => 'required|numeric|min:0.01',
        'image' => 'required|image|max:1024', // <-- NEW RULE: Must be an image, max 1MB
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveProduct()
    {
        // 1. Validate the input fields and image
        $this->validate();

        // 2. Create the product in the database
        $product = Product::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        // 3. Spatie Media Library: Add the uploaded image to the product
        // The file is automatically stored in storage/app/public/ and linked in the 'media' table.
        $product->addMedia($this->image->getRealPath())
                ->usingFileName($this->image->hashName())
                ->toMediaCollection('images');

        // 4. Reset form and redirect
        $this->reset(['title', 'description', 'price', 'image']);

        session()->flash('message', 'Product listing created successfully and image uploaded!');

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.seller.create-product')
            ->layout('components.layouts.app-layout');
    }
}