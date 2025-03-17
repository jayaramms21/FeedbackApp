@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Batch List</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Batch No</th>
                <th>Interview Date</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Coordinator</th>
                <th>Timings</th>
                <th>Students</th>
                <th>Course Fee</th>
            </tr>
        </thead>
        <tbody>
            @foreach($batches as $batch)
            <tr>
                <td>{{ $batch->courseId }}</td>
                <td>{{ $batch->courseName }}</td>
                <td>{{ $batch->bno }}</td>
                <td>{{ $batch->interdt }}</td>
                <td>{{ $batch->strtdt }}</td>
                <td>{{ $batch->enddt }}</td>
                <td>{{ $batch->coordinator }}</td>
                <td>{{ $batch->tm }}</td>
                <td>{{ $batch->numst }}</td>
                <td>{{ $batch->courseFee }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
