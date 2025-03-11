<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\FacultyRating;
use App\Models\CourseRating;
use Illuminate\Support\Facades\Log;


class RatingController extends Controller
{
    public function calculateRatings()
    {
        // Fetch Faculty Ratings
        $facultyRatings = Feedback::selectRaw('faculty_id, 
            SUM(CAST(JSON_UNQUOTE(JSON_EXTRACT(faculty_rating, "$[0]")) AS UNSIGNED) + 
                CAST(JSON_UNQUOTE(JSON_EXTRACT(faculty_rating, "$[1]")) AS UNSIGNED) + 
                CAST(JSON_UNQUOTE(JSON_EXTRACT(faculty_rating, "$[2]")) AS UNSIGNED) + 
                CAST(JSON_UNQUOTE(JSON_EXTRACT(faculty_rating, "$[3]")) AS UNSIGNED)) 
            as total_marks, COUNT(*) as total_feedbacks')
            ->whereNotNull('faculty_id') 
            ->groupBy('faculty_id')
            ->get();
    
        // Fetch Course Ratings
        $courseRatings = Feedback::selectRaw('course_id, 
            SUM(CAST(JSON_UNQUOTE(JSON_EXTRACT(course_rating, "$[0]")) AS UNSIGNED) + 
                CAST(JSON_UNQUOTE(JSON_EXTRACT(course_rating, "$[1]")) AS UNSIGNED) + 
                CAST(JSON_UNQUOTE(JSON_EXTRACT(course_rating, "$[2]")) AS UNSIGNED) + 
                CAST(JSON_UNQUOTE(JSON_EXTRACT(course_rating, "$[3]")) AS UNSIGNED) + 
                CAST(JSON_UNQUOTE(JSON_EXTRACT(course_rating, "$[4]")) AS UNSIGNED)) 
            as total_marks, COUNT(*) as total_feedbacks')
            ->whereNotNull('course_id') 
            ->groupBy('course_id')
            ->get();
    
        // Save Faculty Ratings
        foreach ($facultyRatings as $rating) {
            if ($rating->total_feedbacks == 0) continue; // Avoid division by zero
    
            $max_marks = $rating->total_feedbacks * 20; // Adjusted for 4 questions
            $facultyRating = ($rating->total_marks / $max_marks) * 100;
    
            FacultyRating::updateOrCreate(
                ['faculty_id' => $rating->faculty_id],
                ['faculty_rating' => $facultyRating]
            );
        }
    
        // Save Course Ratings
        foreach ($courseRatings as $rating) {
            if ($rating->total_feedbacks == 0) continue;
            
            $max_marks = $rating->total_feedbacks * 25;
            $courseRating = ($rating->total_marks / $max_marks) * 100;
        
            // Debugging Output
            \Log::info("Course ID: {$rating->course_id}, Total Marks: {$rating->total_marks}, Max Marks: {$max_marks}, Calculated Rating: {$courseRating}");
        
            try {
                CourseRating::updateOrCreate(
                    ['course_id' => $rating->course_id],
                    ['course_rating' => $courseRating]
                );
            } catch (\Exception $e) {
                \Log::error("Error saving CourseRating: " . $e->getMessage());
            }
        }
        
        
        
    
        return redirect()->route('admin.ratings')->with('success', 'Ratings calculated successfully!');
    }
    

// testing****************************************************

public function testCourseRating()
{
    // Fetch Course Ratings
    $courseRatings = Feedback::selectRaw('course_id, 
        SUM(CAST(JSON_UNQUOTE(JSON_EXTRACT(course_rating, "$[0]")) AS UNSIGNED) + 
            CAST(JSON_UNQUOTE(JSON_EXTRACT(course_rating, "$[1]")) AS UNSIGNED) + 
            CAST(JSON_UNQUOTE(JSON_EXTRACT(course_rating, "$[2]")) AS UNSIGNED) + 
            CAST(JSON_UNQUOTE(JSON_EXTRACT(course_rating, "$[3]")) AS UNSIGNED) + 
            CAST(JSON_UNQUOTE(JSON_EXTRACT(course_rating, "$[4]")) AS UNSIGNED)) 
        as total_marks, COUNT(*) as total_feedbacks')
        ->whereNotNull('course_id') 
        ->groupBy('course_id')
        ->get();

    // Save Course Ratings
    foreach ($courseRatings as $rating) {
        if ($rating->total_feedbacks == 0) continue;

        $max_marks = $rating->total_feedbacks * 25;
        $courseRating = ($rating->total_marks / $max_marks) * 100;

        CourseRating::updateOrCreate(
            ['course_id' => $rating->course_id],
            ['course_rating' => $courseRating]
        );
    }

    return view('admin.test-course-rating', compact('courseRatings'));
}


   //************************************************************ */ 
    public function showRatings()
{
    $facultyRatings = FacultyRating::all();
    $courseRatings = CourseRating::all();

    return view('admin.ratings', compact('facultyRatings', 'courseRatings'));
    dd($courseRatings);
}




}
