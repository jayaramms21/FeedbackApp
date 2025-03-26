<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Batch;
use App\Models\Subject;
use App\Models\Faculty;
use App\Models\FacultyMapping;
use App\Models\Stafftp; 

class FacultyMappingController extends Controller
{
  /* public function index()
{
    // Fetch all courses, batches, subjects, and faculties
    $courses = Course::all();
    $batches = Batch::all();
    $subjects = Subject::all();
    $faculties = StaffTp::all();

    // Fetch faculty mappings with relationships
    $mappings = FacultyMapping::with(['course', 'batch', 'subject', 'faculty'])->get();

    // Debugging: Check what is inside $mappings
    if ($mappings->isEmpty()) {
        dd("No faculty mappings found! Please add some mappings first.");
    }

    // Check if faculty relationship exists for all mappings
    foreach ($mappings as $mapping) {
        if (!$mapping->faculty) {
            dd("Faculty ID {$mapping->faculty_id} not found in staff_tp table.", $mappings->toArray());
        }
    }

    return view('admin.faculty-mapping.index', compact('courses', 'batches', 'subjects', 'faculties', 'mappings'));
}

*/
public function index()
{
    $courses = Course::all();
    $batches = Batch::all();
    $subjects = Subject::all();
    $faculties = StaffTp::all();

    // Fetch mappings with relationships
    $mappings = FacultyMapping::with(['course', 'batch', 'subject', 'faculty'])->get();

    // Debugging: Check if faculty is an array instead of an object
   /* foreach ($mappings as $map) {
        if (is_array($map->faculty)) {
            dd($map->faculty); // This will output the incorrect array structure
        }*/
        foreach ($mappings as $map) {
            if (!is_object($map->faculty)) {
                dd("Faculty data is not an object!", $map->faculty);
            }
        }
        
    

    return view('admin.faculty-mapping.index', compact('courses', 'batches', 'subjects', 'faculties', 'mappings'));
}


    public function store(Request $request)
    {
        dd($request->all()); // Debugging request data
        dd('Route is working!', $request->all());
        $request->validate([
            'course_id' => 'required',
            'batch_id' => 'required',
            'subject_id' => 'required',
            'faculty_id' => 'required',

        ]);
       


        FacultyMapping::create([
            'course_id' => $request->course_id,
            'batch_id' => $request->batch_id,
            'subject_id' => $request->subject_id,
            'faculty_id' => $request->faculty_id,
        ]);

        return redirect()->route('admin.facultyMapping')->with('success', 'Faculty mapping added successfully.');
    }

    
}
