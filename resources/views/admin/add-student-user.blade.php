@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add Student as User</h2>

    <table class="table table-bordered">
        <tr>
            <th>Reg No</th>
            <td>{{ $student->regno }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $student->stname }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $student->emailid }}</td>
        </tr>
    </table>

    @if($existingUser)
        <div class="alert alert-info">Already a User</div>
    @else
        <form action="{{ route('admin.storeStudentAsUser') }}" method="POST">
            @csrf
            <input type="hidden" name="regno" value="{{ $student->regno }}">
            <input type="hidden" name="email" value="{{ $student->emailid }}">

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Add as User</button>
        </form>
    @endif
</div>
@endsection
