@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Staff Details</h1>

    <div class="row">
        <!-- Add New Staff Form -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add Staff</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.staff.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="emp_number" class="form-label">Employee Number</label>
                            <input type="number" class="form-control" id="emp_number" name="emp_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="emp_name" class="form-label">Employee Name</label>
                            <input type="text" class="form-control" id="emp_name" name="emp_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="flag" class="form-label">Active Status</label>
                            <select class="form-control" id="flag" name="flag">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- View Staff Details -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-secondary text-white">
                    <h4 class="mb-0">Staff List</h4>
                </div>
                <div class="card-body">
                    @if(isset($staffMembers) && $staffMembers->count() > 0)
                        <table class="table table-borderless">
                            <thead>
                                <tr class="bg-light">
                                    <th>Employee Number</th>
                                    <th>Employee Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staffMembers as $staff)
                                    <tr>
                                        <td>{{ $staff->emp_number }}</td>
                                        <td>{{ $staff->emp_name }}</td>
                                        <td>
                                            <span class="badge {{ $staff->flag == 1 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $staff->flag == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">No staff details available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
