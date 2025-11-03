<x-layouts.app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="row">

                            <!-- Product Image Display -->
                            <div class="col-md-5 mb-4 mb-md-0">
                                @php
                                    // Check if the product has an image in the 'images' collection
                                    $image = $product->getFirstMedia('images');
                                @endphp

                                @if ($image)
                                    <img
                                        src="{{ $image->getUrl() }}"
                                        alt="{{ $product->title }}"
                                        class="img-fluid rounded-3 shadow-sm border border-secondary"
                                        style="object-fit: cover; max-height: 400px; width: 100%;"
                                    >
                                @else
                                    <div class="d-flex align-items-center justify-content-center bg-light border rounded-3" style="height: 400px;">
                                        <p class="text-muted mb-0">No Image Available</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Product Details and Actions -->
                            <div class="col-md-7">
                                <h1 class="display-5 fw-bold mb-3">{{ $product->title }}</h1>

                                <p class="text-success display-6 fw-bold mb-4">${{ number_format($product->price, 2) }}</p>

                                <div class="mb-4">
                                    <h5 class="fw-semibold">Description</h5>
                                    <p class="text-muted whitespace-pre-wrap">{{ $product->description }}</p>
                                </div>

                                <p class="text-sm text-gray-500 mb-4">Listed by: <span class="fw-semibold">{{ $product->user->name }}</span></p>

                                <!-- Buy Now Button Livewire Component -->
                                @livewire('product.buy-now-button', ['product' => $product])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
