{{-- <x-layouts.app-layout> --}}
    <div class="container py-5">
        <h1 class="mb-4 text-center">Explore Latest Listings</h1>
        <hr class="mb-5">

        <div class="row g-4">
            @forelse ($products as $product)
                @php
                    // Retrieve the first image from the 'images' collection
                    $image = $product->getFirstMedia('images');
                @endphp
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow-sm h-100">

                        <!-- Image Area -->
                        <div style="height: 200px; overflow: hidden;" class="w-100">
                            @if ($image)
                                <img
                                    src="{{ $image->getUrl() }}"
                                    class="card-img-top"
                                    alt="{{ $product->title }}"
                                    style="object-fit: cover; height: 100%; width: 100%;"
                                >
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light border-bottom" style="height: 100%;">
                                    <p class="text-muted mb-0 small">No Image</p>
                                </div>
                            @endif
                        </div>

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold mb-2">
                                <a href="{{ route('product.show', $product) }}" class="text-decoration-none text-dark">
                                    {{ Str::limit($product->title, 35) }}
                                </a>
                            </h5>
                            <p class="card-text text-muted small flex-grow-1" style="max-height: 40px; overflow: hidden;">
                                {{ Str::limit($product->description, 50) }}
                            </p>

                            <!-- Price, Quantity, and Link -->
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                <!-- Price -->
                                <span class="h5 text-success fw-bold m-0">${{ number_format($product->price, 2) }}</span>

                                <!-- Quantity Status (NEW) -->
                                @if ($product->quantity > 0)
                                    <span class="badge bg-secondary-subtle text-secondary small fw-normal ms-2 me-auto">
                                        {{ $product->quantity }} in stock
                                    </span>
                                @else
                                    <span class="badge bg-danger small fw-normal ms-2 me-auto">
                                        Sold Out
                                    </span>
                                @endif

                                <!-- Details Button -->
                                <a href="{{ route('product.show', $product) }}" class="btn btn-sm btn-primary rounded-pill">
                                    Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        No products listed yet. Be the first seller!
                    </div>
                </div>
            @endforelse
        </div>
    </div>
{{-- </x-layouts.app-layout> --}}
