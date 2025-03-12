@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Batch Details</h2>
    <form action="{{ url('/admin/batches') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Batch Number</label>
            <input type="number" name="bno" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Course ID</label>
            <input type="text" name="courseId" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Batch</button>
    </form>
</div>
@endsection
