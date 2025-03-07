@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="login-box d-flex flex-column align-items-center p-4">
        <h2 class="text-center mb-4">Register</h2>

        @if ($errors->any())
            <div class="alert alert-danger w-100">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="w-100 d-flex flex-column">
            @csrf

            <div class="mb-3 d-flex flex-column">
                <label for="name" class="form-label">Name</label>
                <input type="name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 d-flex flex-column">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 d-flex flex-column">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 d-flex flex-column">
                <label for="Confirm password" class="form-label">Confirm Password</label>
                <input type="Confirm password" name="Confirm password" id="Cpassword" class="form-control @error('Cpassword') is-invalid @enderror" required>
                @error('Cpassword')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 d-flex align-items-center">
                <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <div class="d-grid gap-2 w-100">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

            <div class="mt-3 text-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                @endif
            </div>

            <div class="mt-3 text-center">
                <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
