@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Course Details</h2>
    <form action="{{ route('admin.Courses') }}" method="POST">
    @csrf
    <label for="courseId">Course ID:</label>
    <input type="text" name="courseId" required>
    
    <label for="courseName">Course Name:</label>
    <input type="text" name="courseName" required>

    <button type="submit">Submit</button>
</form>

</div>
@endsection

