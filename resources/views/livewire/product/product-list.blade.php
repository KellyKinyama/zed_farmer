{{-- <x-layouts.app-layout> --}}
    <div class="container py-5">
        <h1 class="mb-4 text-center">Explore Latest Listings</h1>
        <hr class="mb-5">

        <div class="row g-4">
            @forelse ($products as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">
                                <a href="{{ route('product.show', $product) }}" class="text-decoration-none text-primary">
                                    {{ $product->title }}
                                </a>
                            </h5>
                            <p class="card-text text-muted flex-grow-1" style="max-height: 75px; overflow: hidden;">
                                {{ Str::limit($product->description, 100) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="h4 text-success fw-bold">${{ number_format($product->price, 2) }}</span>
                                <a href="{{ route('product.show', $product) }}" class="btn btn-sm btn-outline-primary">
                                    View Details
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