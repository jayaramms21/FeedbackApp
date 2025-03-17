@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Student List</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Reg No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Sex</th>
                <th>DOB</th>
                <th>Guardian</th>
                <th>Contact</th>
                <th>Course</th>
                <th>Batch No</th>
                <th>Start Date</th>
                <th>Grant Status</th>
                <th>Timings</th>
                <th>Roll No</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->regno }}</td>
                <td>{{ $student->stname }}</td>
                <td>{{ $student->emailid }}</td>
                <td>{{ $student->sex }}</td>
                <td>{{ $student->dob }}</td>
                <td>{{ $student->guardian }}</td>
                <td>{{ $student->conum }}</td>
                <td>{{ $student->courseName }}</td>
                <td>{{ $student->bno }}</td>
                <td>{{ $student->strtdt }}</td>
                <td>{{ $student->grnstatus }}</td>
                <td>{{ $student->tm }}</td>
                <td>{{ $student->rollNo }}</td>
                <td>{{ $student->remark }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Back Button (Optional at Bottom) -->
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mt-3">Back to Admin</a>
</div>
@endsection
