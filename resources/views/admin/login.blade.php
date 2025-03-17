@extends('layouts.app')

@section('content')

<style>
    .vh-100 {
        background-image: url('https://scontent.fmnl30-2.fna.fbcdn.net/v/t39.30808-6/463016522_9011482772203863_7854206505027192352_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=cf85f3&_nc_ohc=lb1jOpaeTE0Q7kNvgFNjF5B&_nc_oc=AditgdffjJ62FU0jC1wMCH_9UgfW2WvI9LALS4mSYQ-vaAwuqxQtwg70CxHS4neMzqQ&_nc_zt=23&_nc_ht=scontent.fmnl30-2.fna&_nc_gid=Ae-OZ5JOyanYYmvB0pPR80Q&oh=00_AYFDxN2KkPx1GloMGeq_DdHTXdADlI7WAQ-9O0_yqNNDTg&oe=67D82C5D');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="login-box d-flex flex-column align-items-center p-5 bg-white shadow rounded" style="min-height: 450px; width: 400px;">
        <h2 class="text-center mb-4">Login</h2>

        @if ($errors->any())
            <div class="alert alert-danger w-100">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}" class="w-100">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', 'eyeIcon')">
                        <i id="eyeIcon" class="fas fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex justify-content-center w-100">
                <button type="submit" class="btn btn-success btn-sm px-5 py-2" style="font-size: 16px;">Login</button>
            </div>
        </form>
    </div>
</div>


@endsection

<script>
    function togglePassword(inputId, eyeIconId) {
        let passwordInput = document.getElementById(inputId);
        let eyeIcon = document.getElementById(eyeIconId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script>

