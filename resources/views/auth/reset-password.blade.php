@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color:rgb(255, 255, 255);"> <!-- Light Blue Background -->
    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
        <h2 class="text-center text-danger mb-3">Reset Password</h2> <!-- Red Text -->
        <p class="text-center text-primary"><em>Enter your new password.</em></p> <!-- Italic & Blue Text -->

        <!-- Success Message -->
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="email" value="{{ request()->email }}">

            <div class="mb-3">
                <label for="password" class="form-label text-danger">New Password</label> <!-- Red Label -->
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label text-danger">Confirm Password</label> <!-- Red Label -->
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-warning w-100">Reset Password</button> <!-- Orange Button -->
        </form>
    </div>
</div>

<!-- Bootstrap JavaScript for Dismissible Alerts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
