{{-- resources/views/livewire/seller/create-product.blade.php --}}
<div>
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="saveProduct" class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Create New Listing</h2>

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Product Title</label>
            <input type="text" id="title" wire:model.blur="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" wire:model.blur="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label for="price" class="block text-sm font-medium text-gray-700">Price (USD)</label>
            <input type="number" step="0.01" min="0.01" id="price" wire:model.blur="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Create Listing
        </button>
    </form>
</div>