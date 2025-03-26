@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>View Courses</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Short Form</th>
                <th>Coordinator</th>
                <th>Course Fee</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->courseId }}</td>
                    <td>{{ $course->courseName }}</td>
                    <td>{{ $course->shortForm }}</td>
                    <td>{{ $course->coordinator }}</td>
                    <td>{{ $course->courseFee }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.courses') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
