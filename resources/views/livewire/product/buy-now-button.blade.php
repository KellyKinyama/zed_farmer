<div>
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif

    @auth
        <button
            wire:click="buyNow"
            wire:loading.attr="disabled"
            class="btn btn-success btn-lg w-100 shadow-sm"
            style="min-height: 50px;">
            <span wire:loading.remove wire:target="buyNow">Buy It Now</span>
            <span wire:loading wire:target="buyNow">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Processing...
            </span>
        </button>
    @else
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg w-100 shadow-sm">
            Login to Buy
        </a>
    @endauth
</div>
