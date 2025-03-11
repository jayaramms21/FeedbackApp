<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\FacultyRating;
use App\Models\CourseRating;

class RatingController extends Controller
{
    public function calculateRatings()
    {
        // Calculate Faculty Ratings
        $facultyRatings = Feedback::selectRaw('faculty_id, SUM(question1_rating + question2_rating + question3_rating + question4_rating + question5_rating) as total_marks, COUNT(*) as total_feedbacks')
            ->groupBy('faculty_id')
            ->get();
    
        foreach ($facultyRatings as $rating) {
            $max_marks = $rating->total_feedbacks * 50; 
            $facultyRating = ($rating->total_marks / $max_marks) * 100;
    
            FacultyRating::updateOrCreate(
                ['faculty_id' => $rating->faculty_id],
                ['faculty_rating' => $facultyRating]
            );
        }
    
        // Calculate Course Ratings
        $courseRatings = Feedback::selectRaw('course_id, SUM(question1_rating + question2_rating + question3_rating + question4_rating + question5_rating) as total_marks, COUNT(*) as total_feedbacks')
            ->groupBy('course_id')
            ->get();
    
        foreach ($courseRatings as $rating) {
            $max_marks = $rating->total_feedbacks * 50;
            $courseRating = ($rating->total_marks / (float)$max_marks) * 100;
    
            $courseRatingEntry = CourseRating::updateOrCreate(
                ['course_id' => $rating->course_id],
                ['course_rating' => $courseRating]
            );
            
            // Log the update operation
            \Log::info("Course Rating Saved: " . json_encode($courseRatingEntry));
            
        }
    
        return redirect()->route('admin.ratings')->with('success', 'Ratings calculated successfully!');
    }
    public function showRatings()
{
    $facultyRatings = FacultyRating::all();
    $courseRatings = CourseRating::all();

    return view('admin.ratings', compact('facultyRatings', 'courseRatings'));
}

}
