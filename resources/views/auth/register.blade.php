<x-layouts.app-layout>
    <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
    <div class="card shadow-lg border-0 rounded-4">
    <div class="card-body p-4 p-md-5">
    <h2 class="card-title text-center mb-4 fw-bold text-primary">Create Your ZedFarmer Account</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-control @error('name') is-invalid @enderror" placeholder="John Doe">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror" placeholder="your.email@example.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control" placeholder="••••••••">
                        </div>

                        <!-- Registration Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                                Register
                            </button>
                        </div>
                    </form>

                    <p class="text-center mt-4 mb-0 small text-muted">
                        Already registered?
                        <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
                            Login here
                        </a>
                    </p>

                </div>
            </div>
        </div>
    </div>


    </x-layouts.app-layout>