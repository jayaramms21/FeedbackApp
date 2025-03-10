@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-warning fw-bold display-4" style="font-family: 'Georgia', serif;">📋 Feedback Rating</h2>

        <!-- Logout Button -->
        <div class="d-flex justify-content-end">
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger px-4 py-2 fw-bold shadow-sm" 
            style="border-radius: 8px; transition: 0.3s; font-size: 1.2rem;">
            🚪 Logout
        </button>
    </form>
</div>


    <!-- Feedback Form Card -->
    <div class="card shadow-lg border-0 rounded-4" style="background: #ffffff;">
        <div class="card-body p-5">
            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success text-center fw-semibold" style="font-size: 1.2rem;">
                    🎉 {{ session('success') }}
                </div>
            @endif

            <!-- Feedback Form -->
            <form action="{{ route('feedback.store') }}" method="POST">
                @csrf

                <h4 class="text-dark fw-bold mb-4" style="font-family: 'Georgia', serif;">⭐ Faculty Rating</h4>
                @foreach ([
                    'Ability of the faculty to explain concepts clearly',
                    'Punctuality of the faculty',
                    'Ability of the faculty to generate interest in the subject',
                    'Encouraging students to ask doubts'
                ] as $index => $question)
                <div class="form-group mb-4">
                    <label class="fw-semibold" style="font-size: 1.2rem; font-family: 'Arial', sans-serif; line-height: 1.5;">{{ $question }}</label>
                    <select name="faculty_rating[{{ $index }}]" class="form-control" required style="font-size: 1.1rem;">
                        <option value="5">🌟 Excellent</option>
                        <option value="4">👍 Good</option>
                        <option value="3">🙂 Fair</option>
                        <option value="1">👎 Poor</option>
                    </select>
                </div>
                @endforeach

                <h4 class="text-dark fw-bold mt-5 mb-4" style="font-family: 'Georgia', serif;">📚 Course Rating</h4>
                @foreach ([
                    'Course/module content or syllabus',
                    'Classroom facilities available',
                    'Lab facilities available',
                    'Lab support received',
                    'Course material issued to students',
                    'Classroom presentation material and teaching aids'
                ] as $index => $question)
                <div class="form-group mb-4">
                    <label class="fw-semibold" style="font-size: 1.2rem; font-family: 'Arial', sans-serif; line-height: 1.5;">{{ $question }}</label>
                    <select name="course_rating[{{ $index }}]" class="form-control" required style="font-size: 1.1rem;">
                        <option value="5">🌟 Excellent</option>
                        <option value="4">👍 Good</option>
                        <option value="3">🙂 Fair</option>
                        <option value="1">👎 Poor</option>
                    </select>
                </div>
                @endforeach

                <!-- Submit Button -->
                
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary px-5 py-3 fw-bold shadow-sm" 
                        style="border-radius: 10px; transition: 0.3s; font-size: 1.3rem; background:rgb(59, 117, 224); border: none; line-height: 2;">
                        📩 Submit Feedback
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Additional Styling -->
<style>
    body {
        background: linear-gradient(to right,rgb(255, 255, 255),rgb(235, 239, 245));
        font-family: 'Arial', sans-serif;
    }
    .btn:hover {
        transform: scale(1.07);
    }
    .card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    select.form-control {
        border-radius: 8px;
    }
</style>
@endsection
