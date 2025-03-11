<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseRating;


use App\Models\User;
class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'faculty_rating' => 'required|array',
            'course_rating' => 'required|array'
        ]);

        // Store feedback in the database
        Feedback::create([
            'student_id' => Auth::id(), // Assuming the student is logged in
            'faculty_rating' => $request->faculty_rating,
            'course_id' => $request->course_id,
            'course_rating' => $request->course_rating
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }



    public function index()
    {
        // Fetch feedback with user details
        $feedbacks = Feedback::with('user')->get();

        return view('admin.feedback', compact('feedbacks'));
    }


}