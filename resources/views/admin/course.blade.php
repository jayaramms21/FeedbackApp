@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add Course</h2>

    <!-- Show Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.courses.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="courseId" class="form-label">Course ID:</label>
            <input type="text" class="form-control" name="courseId" required>
        </div>

        <div class="mb-3">
            <label for="courseName" class="form-label">Course Name:</label>
            <input type="text" class="form-control" name="courseName" required>
        </div>

        <div class="mb-3">
            <label for="shortForm" class="form-label">Short Form:</label>
            <input type="text" class="form-control" name="shortForm">
        </div>

        <div class="mb-3">
            <label for="coordinator" class="form-label">Coordinator:</label>
            <input type="text" class="form-control" name="coordinator">
        </div>

        <div class="mb-3">
            <label for="courseFee" class="form-label">Course Fee:</label>
            <input type="number" class="form-control" name="courseFee">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('admin.courses.view') }}" class="btn btn-primary">View Courses</a>
    </form>
</div>
@endsection
