@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Reset Password</h2>
    <p>Enter your new password.</p>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="email" value="{{ $email ?? '' }}">

        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Reset Password</button>
    </form>
</div>
@endsection
