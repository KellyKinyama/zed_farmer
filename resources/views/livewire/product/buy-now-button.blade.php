<div>
    @if ($product->quantity > 0)
        <form wire:submit.prevent="buyNow" class="d-flex align-items-center flex-wrap gap-3">

            <!-- Quantity Input -->
            <div>
                <label for="quantity-input" class="form-label mb-0 small text-muted">Quantity</label>
                <input
                    type="number"
                    id="quantity-input"
                    wire:model.live="selectedQuantity"
                    min="1"
                    max="{{ $product->quantity }}"
                    class="form-control form-control-sm text-center @error('selectedQuantity') is-invalid @enderror"
                    style="width: 80px;"
                >
                @error('selectedQuantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Total Price Display -->
            <div class="d-none d-sm-block">
                <p class="form-label mb-0 small text-muted">Total Price</p>
                <p class="h5 fw-bold text-dark m-0">
                    <!-- Calculate total price dynamically -->
                    ${{ number_format($product->price * $selectedQuantity, 2) }}
                </p>
            </div>

            <!-- Buy Button -->
            <button
                type="submit"
                class="btn btn-primary btn-lg rounded-pill shadow-sm"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>Buy Now</span>
                <span wire:loading>Processing...</span>
            </button>
        </form>
    @else
        <button class="btn btn-danger btn-lg rounded-pill shadow-sm" disabled>
            Out of Stock
        </button>
    @endif
</div>