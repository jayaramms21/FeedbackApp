@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Update User - Student List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Reg No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->regno }}</td>
                <td>{{ $student->stname }}</td>
                <td>{{ $student->emailid }}</td>
                <td>{{ $student->conum }}</td>
                <td>{{ $student->courseName }}</td>
                <td>
                    @php
                        $userExists = \App\Models\User::where('email', $student->emailid)
                                      ->orWhere('username', $student->regno)->exists();
                    @endphp
                    
                    @if($userExists)
                        <span class="badge bg-success">Already a User</span>
                    @else
                        <a href="{{ route('admin.addStudentAsUser', $student->regno) }}" class="btn btn-primary">Add as User</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
