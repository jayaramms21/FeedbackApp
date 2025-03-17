@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Staff List</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Emp Number</th>
                    <th>Emp Name</th>
                    <th>Flag</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffMembers as $staff)
                <tr>
                    <td>{{ $staff->emp_number }}</td>
                    <td>{{ $staff->emp_name }}</td>
                    <td>{{ $staff->flag }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Back Button (Optional at Bottom) -->
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mt-3">Back to Admin</a>
    </div>
@endsection
