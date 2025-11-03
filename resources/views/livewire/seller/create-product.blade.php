<div class="row justify-content-center py-5">
    <div class="col-lg-8">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form wire:submit.prevent="saveProduct" class="card shadow-lg p-4 p-md-5">
            <h2 class="card-title text-2xl font-bold mb-4">Create New Listing</h2>

            <div class="mb-3">
                <label for="title" class="form-label">Product Title</label>
                <input type="text" id="title" wire:model.blur="title" class="form-control @error('title') is-invalid @enderror">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" wire:model.blur="description" rows="4" class="form-control @error('description') is-invalid @enderror"></textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price (USD)</label>
                <input type="number" step="0.01" min="0.01" id="price" wire:model.blur="price" class="form-control @error('price') is-invalid @enderror">
                @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" id="image" wire:model="image" class="form-control @error('image') is-invalid @enderror">
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror

                @if ($image)
                    <div class="mt-3">
                        <p class="small text-muted mb-1">Image Preview:</p>
                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                    </div>
                @endif

                <div wire:loading wire:target="image" class="mt-2 text-primary small">
                    Uploading... please wait.
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg mt-3" wire:loading.attr="disabled" wire:target="saveProduct, image">
                <span wire:loading.remove wire:target="saveProduct">Create Listing</span>
                <span wire:loading wire:target="saveProduct">Saving Listing...</span>
                <span wire:loading wire:target="image" class="spinner-border spinner-border-sm ms-2" role="status"></span>
            </button>
        </form>
    </div>
</div>