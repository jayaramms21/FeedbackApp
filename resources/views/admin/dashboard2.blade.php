<h1>Admin Dashboard</h1>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<!--
@extends('layouts.app')-->
@extends('layouts.admin')  


@section('content')
<div class="container">
    

    <a href="{{ route('admin.feedback') }}" class="btn btn-primary">View Feedback</a>

    <h3>Recent Feedback</h3>
    @if(isset($feedbacks) && $feedbacks->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Faculty Rating</th>
                    <th>Course Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->user->name ?? 'Unknown' }}</td>
                        <td>{{ json_encode($feedback->faculty_rating) }}</td>
                        <td>{{ json_encode($feedback->course_rating) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No feedback available.</p>
    @endif
</div>
@endsection

<a href="{{ route('calculate.ratings') }}">Calculate Ratings</a>
<a href="{{ route('admin.calculate-ratings') }}" class="btn btn-success">Calculate Ratings</a>-->
<a href="{{ route('admin.calculate-ratings') }}" class="btn btn-success">Calculate Ratings</a>
<a href="{{ route('admin.ratings') }}" class="btn btn-secondary">View Ratings</a>


