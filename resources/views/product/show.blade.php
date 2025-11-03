<x-layouts.app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="card-title display-4 mb-3">{{ $product->title }}</h1>
                        <p class="text-success fs-2 fw-bold mb-4">${{ number_format($product->price, 2) }}</p>

                        <h2 class="h5 border-bottom pb-2 mb-3">Description</h2>
                        <div class="mb-4">
                            <p class="text-secondary whitespace-pre-wrap">{{ $product->description }}</p>
                        </div>

                        {{-- ⭐️ Embedded Livewire Component for Purchase Action --}}
                        @livewire('product.buy-now-button', ['product' => $product])

                        <p class="mt-4 text-muted small">
                            Listed by: {{ $product->user->name ?? 'Unknown Seller' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>