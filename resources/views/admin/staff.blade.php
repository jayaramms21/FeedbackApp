@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Staff Details</h2>
    <form action="{{ url('/admin/staff') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Employee Number</label>
            <input type="number" name="emp_number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="emp_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Staff</button>
    </form>
</div>
@endsection
