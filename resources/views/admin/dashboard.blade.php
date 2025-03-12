@extends('layouts.admin')

@section('content')
<!-- New Code -->

<div class="container">
    <h1>Admin Dashboard</h1>

    <!-- Navigation Buttons -->
    <div class="d-flex gap-3 mb-4">
        <a href="{{ route('admin.students') }}" class="btn btn-info">Student Details</a>
        <a href="{{ route('admin.staff') }}" class="btn btn-warning">Staff Details</a>
        <a href="{{ route('admin.courses') }}" class="btn btn-primary">Course Details</a>
        <a href="{{ route('admin.batches') }}" class="btn btn-secondary">Batch Details</a>
        <a href="{{ route('admin.updateUser') }}" class="btn btn-dark">Update User</a>
    </div>
</div>

<div class="container mt-4">
    <h1>Admin Dashboard</h1>

    <!-- Action Buttons -->
    <div class="d-flex justify-content-end mb-3">
      <!--  <a href="{{ route('admin.calculate-ratings') }}" class="btn btn-success me-2">Calculate Ratings</a>
        <a href="{{ route('admin.ratings') }}" class="btn btn-secondary">View Ratings</a> -->
    </div>

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
                            {{ is_array($feedback->faculty_rating) 
                                ? round(collect($feedback->faculty_rating)->avg(), 2) 
                                : round(collect(json_decode($feedback->faculty_rating, true))->avg(), 2) 
                            }}
                        </td>
                        <td>
                            {{ is_array($feedback->course_rating) 
                                ? round(collect($feedback->course_rating)->avg(), 2) 
                                : round(collect(json_decode($feedback->course_rating, true))->avg(), 2) 
                            }}
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
