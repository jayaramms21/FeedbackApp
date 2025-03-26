@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Feedback Results</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Email</th>
                <th>Faculty Rating</th>
                <th>Course Rating</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->user->username }}</td>
                    <td>{{ $feedback->user->email }}</td>
                    <td>{{ implode(', ', $feedback->faculty_rating) }}</td>
                    <td>{{ implode(', ', $feedback->course_rating) }}</td>
                    <td>{{ $feedback->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Admin Home</a>

</div>
@endsection
