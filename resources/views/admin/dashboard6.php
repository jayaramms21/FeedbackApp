@extends('layouts.admin')

@section('content')
<div class="container">
    <!-- Navigation Buttons -->
    <div class="d-flex gap-3 mb-4">
        <a href="{{ route('admin.students') }}" class="btn btn-info">Student Details</a>
        <a href="{{ route('admin.staff') }}" class="btn btn-warning">Staff Details</a>
        <a href="{{ route('admin.courses') }}" class="btn btn-primary">Course Details</a>
        <a href="{{ route('admin.batches') }}" class="btn btn-secondary">Batch Details</a>
        <a href="{{ route('admin.updateUser') }}" class="btn btn-dark">Update User</a>
        <a href="{{ route('admin.facultyMapping') }}" class="btn btn-success">Faculty Mapping</a> <!-- Newly Added -->
    </div>
</div>

<div class="container mt-4">
    <h1>Admin Dashboard</h1>

    <!-- Recent Feedback -->
    <h3>Recent Feedback</h3>
    @if(isset($feedbacks) && $feedbacks->count() > 0)
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Student Name</th>
                    <th>Faculty Rating (Avg)</th>
                    <th>Course Rating (Avg)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->user->name ?? 'Unknown' }}</td>
                        <td>
                            {{ round(collect(json_decode($feedback->faculty_rating, true))->avg(), 2) }}
                        </td>
                        <td>
                            {{ round(collect(json_decode($feedback->course_rating, true))->avg(), 2) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted">No feedback available.</p>
    @endif
</div>
@endsection
