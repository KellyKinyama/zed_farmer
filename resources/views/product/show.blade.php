<x-layouts.app-layout>
    <div class="container py-5">
        <div class="row">
            <!-- Left Column: Image -->
            <div class="col-md-5 mb-4 mb-md-0">
                @php
                    $image = $product->getFirstMedia('images');
                @endphp
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    @if ($image)
                        <img
                            src="{{ $image->getUrl() }}"
                            class="img-fluid w-100"
                            alt="{{ $product->title }}"
                            style="object-fit: cover; max-height: 450px;"
                        >
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light border-bottom p-5" style="min-height: 450px;">
                            <p class="text-muted mb-0 small">No Image Available</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Column: Details and Buy Button -->
            <div class="col-md-7">
                <h1 class="display-5 fw-bold">{{ $product->title }}</h1>
                <p class="lead text-success fw-bold my-3">${{ number_format($product->price, 2) }}</p>

                <hr>

                <!-- Stock Display -->
                <div class="mb-3">
                    <span class="fw-bold">Status: </span>
                    @if ($product->quantity > 0)
                        <span class="badge bg-success fs-6">In Stock ({{ $product->quantity }} available)</span>
                    @else
                        <span class="badge bg-danger fs-6">Out of Stock</span>
                    @endif
                </div>

                <div class="mb-4">
                    <span class="fw-bold">Description</span>
                    <p>{{ $product->description }}</p>
                </div>

                <p class="small text-muted mb-4">
                    Listed by: <span class="fw-semibold">{{ $product->user->name }}</span>
                </p>

                <!-- Buy Button/Login Prompt -->
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                        Login to Buy
                    </a>
                @else
                    <div class="d-flex align-items-center">
                        <!-- The BuyNowButton Livewire component -->
                        @livewire('product.buy-now-button', ['product' => $product], key($product->id))

                        <!-- Seller Action: Delete Button -->
                        @if (Auth::id() === $product->user_id)
                            @livewire('seller.delete-product', ['product' => $product], key('delete-'.$product->id))
                        @endif
                    </div>
                @endguest
            </div>
        </div>
    </div>
</x-layouts.app-layout>
