<x-layouts.app-layout>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h1 class="card-title mb-4 fw-bold text-primary">👋 Welcome Back!</h1>
                    <p class="lead">You are logged into the ZedFarmer Dashboard.</p>

                    @if (session('order_success'))
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            <strong>Success!</strong> {{ session('order_success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="mt-5">
                        <h5 class="mb-3">What's next?</h5>
                        <a href="{{ route('product.create') }}" class="btn btn-primary me-3 mb-2">
                            <i class="fas fa-plus me-1"></i> Create a New Listing
                        </a>
                        <a href="{{ route('product.index') }}" class="btn btn-outline-secondary mb-2">
                            <i class="fas fa-search me-1"></i> Browse Listings
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>