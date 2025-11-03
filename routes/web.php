<?php

use App\Livewire\Buyer\OrderHistory;
use Illuminate\Support\Facades\Route;
use App\Livewire\Seller\CreateProduct;
use App\Livewire\Product\ProductList; // <--- Import the ProductList component
use App\Models\Product; // <--- Import the Product Model

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 1. PUBLIC ROUTES (Product Catalog and Detail)

// Root route shows the product catalog, which is now the post-login HOME route
Route::get('/', ProductList::class)->name('product.index');

// Route for showing a single product detail page
Route::get('/product/{product}', function (Product $product) {
    // This uses a simple blade view for now, as planned
    return view('product.show', compact('product'));
})->name('product.show');


// 2. AUTHENTICATED ROUTES (Seller Functionality)

// This group requires the user to be logged in to access
Route::middleware(['auth'])->group(function () {
    // Route for the seller to create a new product listing
    Route::get('/sell/product/create', CreateProduct::class)->name('product.create');

    // Buyer Route - Order History
    Route::get('/orders/history', OrderHistory::class)->name('orders.history'); // <-- NEW ROUTE

    // You can add more seller/dashboard routes here later
    Route::get('/dashboard', function () {
        return view('dashboard'); // Assuming you have a basic dashboard view
    })->name('dashboard');

    // You can add more seller/dashboard routes here later
    Route::get('/home', function () {
        return view('dashboard'); // Assuming you have a basic dashboard view
    })->name('home');
});