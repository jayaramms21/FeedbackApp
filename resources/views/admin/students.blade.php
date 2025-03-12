@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Student Details</h2>
    <form action="{{ url('/admin/students') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Registration Number</label>
            <input type="text" name="regno" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="stname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="emailid" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Student</button>
    </form>
</div>
@endsection
