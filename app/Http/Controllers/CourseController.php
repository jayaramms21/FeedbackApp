<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.course');
    }

    // Store course data
    public function store(Request $request)
    {
        
        $request->validate([
            'courseId' => 'required|unique:course_tp,courseId|max:50',
            'courseName' => 'required|max:50',
            'shortForm' => 'nullable|max:30',
            'coordinator' => 'nullable|max:50',
            'courseFee' => 'nullable|integer',
        ]);

        Course::create([
            'courseId' => $request->courseId,
            'courseName' => $request->courseName,
            'shortForm' => $request->shortForm,
            'coordinator' => $request->coordinator,
            'courseFee' => $request->courseFee,
            'flag' => 1, // Active by default
        ]);

        return redirect()->route('admin.courses')->with('success', 'Data saved successfully!');
    }

    // View stored courses
    public function view()
    {
        $courses = Course::all();
        return view('admin.view-courses', compact('courses'));
    }
}
