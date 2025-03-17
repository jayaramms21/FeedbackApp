@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Student Details</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.storeStudent') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Registration Number</label>
            <input type="text" name="regno" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="stname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="emailid" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Sex</label>
            <select name="sex" class="form-control">
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="dob" class="form-control">
        </div>
        <div class="mb-3">
            <label>Guardian</label>
            <input type="text" name="guardian" class="form-control">
        </div>
        <div class="mb-3">
            <label>Contact Number</label>
            <input type="text" name="conum" class="form-control">
        </div>
        <div class="mb-3">
            <label>Course Name</label>
            <input type="text" name="courseName" class="form-control">
        </div>
        <div class="mb-3">
            <label>Batch Number</label>
            <input type="number" name="bno" class="form-control">
        </div>
        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="strtdt" class="form-control">
        </div>
        <div class="mb-3">
            <label>Grant Status</label>
            <input type="text" name="grnstatus" class="form-control">
        </div>
        <div class="mb-3">
            <label>Timings</label>
            <input type="text" name="tm" class="form-control">
        </div>
        <div class="mb-3">
            <label>Roll Number</label>
            <input type="number" name="rollNo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Remark</label>
            <input type="text" name="remark" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-success">Save Student</button>
        <a href="{{ route('admin.viewStudents') }}" class="btn btn-primary">View Students</a>
    </form>
</div>
@endsection
