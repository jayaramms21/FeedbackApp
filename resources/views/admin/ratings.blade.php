@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Calculated Ratings</h1>

    <div class="row">
        <!-- Faculty Ratings -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Faculty Ratings</h4>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                            <tr class="bg-light">
                                <th>Faculty ID</th>
                                <th>Rating (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($facultyRatings as $faculty)
                                <tr>
                                    <td>{{ $faculty->faculty_id }}</td>
                                    <td><span class="badge bg-success">{{ number_format($faculty->faculty_rating, 2) }}%</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Course Ratings -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-secondary text-white">
                    <h4 class="mb-0">Course Ratings</h4>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                            <tr class="bg-light">
                                <th>Course ID</th>
                                <th>Rating (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courseRatings as $rating)
                                <tr>
                                    <td>{{ $rating->course_id }}</td>
                                    <td>
                                        <span class="badge bg-info">
                                            {{ $rating->course_rating !== null ? number_format($rating->course_rating, 2) : 'N/A' }}%
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
