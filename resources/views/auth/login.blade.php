<x-layouts.app-layout>
    <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
    <div class="card shadow-lg border-0 rounded-4">
    <div class="card-body p-4 p-md-5">
    <h2 class="card-title text-center mb-4 fw-bold text-primary">Sign In to ZedFarmer</h2>

                    <!-- Session Status Message (e.g., successful registration) -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control @error('email') is-invalid @enderror" placeholder="your.email@example.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                <label class="form-check-label" for="remember_me">
                                    Remember me
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="text-decoration-none text-muted small" href="{{ route('password.request') }}">
                                    Forgot your password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                                Log in
                            </button>
                        </div>
                    </form>

                    <p class="text-center mt-4 mb-0 small text-muted">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">
                            Register here
                        </a>
                    </p>

                </div>
            </div>
        </div>
    </div>


    </x-layouts.app-layout>