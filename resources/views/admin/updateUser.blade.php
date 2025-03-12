@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Update User</h2>
    <form action="{{ url('/admin/update-user') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Username (Student Name)</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password (Reg No)</label>
            <input type="text" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection
