@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Faculty Mapping</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <!--{{ dd(route('admin.facultyMapping.store')) }}-->

    <!--<form action="{{ route('facultyMapping.store') }}" method="POST"> -->
    <!--<form action="{{ route('admin.facultyMapping.store') }}" method="POST"> -->
<!-- <form action=" {{ dd(route('admin.facultyMapping.store')) }}" method="POST"> -->
<!--<form action="{{ url('admin/faculty-mapping/store') }}" method="POST"> -->

<form action="{{ route('admin.facultyMapping.store') }}" method="POST"> 
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label>Course</label>
                <select name="course_id" class="form-control">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label>Batch</label>
                <select name="batch_id" class="form-control">
                    @foreach($batches as $batch)
                        <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label>Subject</label>
                <select name="subject_id" class="form-control">
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label>Faculty</label>
                <select name="faculty_id" class="form-control">
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Add Map</button>
    </form>

    <hr>

    <h3>Existing Mappings</h3>


<!--
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Course</th>
                <th>Batch</th>
                <th>Subject</th>
                <th>Faculty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mappings as $mapping)
                 <tr>
                 
                    <td>{{ $mapping->course->name }}</td>
                    <td>{{ $mapping->batch->name }}</td>
                    <td>{{ $mapping->subject->name }}</td>
                    <td>{{ $mapping->faculty->name }}</td>
                  <td>{{ $facultyMapping->faculty->name ?? 'Unknown' }}</td>
                  <td>{{ $mapping->faculty->name ?? 'Unknown' }}</td> 
                  <td>{{ is_array($mapping->course) ? json_encode($mapping->course) : $mapping->course->name ?? 'N/A' }}</td>
<td>{{ is_array($mapping->batch) ? json_encode($mapping->batch) : $mapping->batch->name ?? 'N/A' }}</td>
<td>{{ is_array($mapping->subject) ? json_encode($mapping->subject) : $mapping->subject->name ?? 'N/A' }}</td>
<td>{{ is_array($mapping->faculty) ? json_encode($mapping->faculty) : $mapping->faculty->name ?? 'N/A' }}</td>



                </tr>

                <tr>
           <td>{{ $mapping->course->name ?? 'N/A' }}</td>
            <td>{{ $mapping->batch->name ?? 'N/A' }}</td>
            <td>{{ $mapping->subject->name ?? 'N/A' }}</td>
           <td>{{ $mapping->faculty->name ?? 'N/A' }}</td> 
           <td>{{ $mapping->course->name ?? 'Unknown' }}</td>

           <td>{{ $mapping->batch->name ?? 'Unknown' }}</td>
           <td>{{ $mapping->subject->name ?? 'Unknown' }}</td>

           <td>{{ $mapping->faculty->name ?? 'Unknown' }}</td>
        <td>{{ $mapping->faculty->emp_name ?? 'Unknown' }}</td>

        


        </tr>

            @endforeach
        </tbody>
    </table>-->
    <table>
    <thead>
        <tr>
            <th>Course Name</th>
            <th>Batch Name</th>
            <th>Subject Name</th>
            <th>Faculty Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mappings as $mapping)
            <tr>
                <td>{{ $mapping->course->name ?? 'Unknown' }}</td>
                <td>{{ $mapping->batch->name ?? 'Unknown' }}</td>
                <td>{{ $mapping->subject->name ?? 'Unknown' }}</td>
                <td>
   <!-- {{ is_object($mapping->faculty) ? $mapping->faculty->emp_name : 'Unknown' }}
    {{ dd($mappings) }} 
    {!! json_encode($mappings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}-->


</td>

            </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
