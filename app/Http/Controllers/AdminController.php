<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); // Ensure this view exists in resources/views/admin/dashboard.blade.php
    }
}
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Course;
use App\Models\Batch;
use App\Models\User;
use App\Models\StaffTp;
use Illuminate\Support\Facades\Hash;
//use App\Models\Batch;
class AdminController extends Controller
{
    public function dashboard()
    {
        // Fetch all feedbacks
        $feedbacks = Feedback::with('user')->get();

        return view('admin.dashboard', compact('feedbacks'));
    }
    public function storeStudent(Request $request) {
        // Validate the request
        $request->validate([
            'regno' => 'required|unique:student,regno', // Fixed table name
            'stname' => 'required',
            'emailid' => 'required|email|unique:users,email',
            'sex' => 'nullable',
            'dob' => 'nullable|date',
            'guardian' => 'nullable',
            'conum' => 'nullable',
            'courseName' => 'nullable',
            'bno' => 'nullable|integer',
            'strtdt' => 'nullable|date',
            'grnstatus' => 'nullable',
            'tm' => 'nullable',
            'rollNo' => 'nullable|integer',
            'remark' => 'nullable'
        ]);
    
        // Insert data into the student table
        $student = Student::updateOrCreate(
            ['regno' => $request->regno], // Unique key
            $request->except(['_token']) // Exclude token
        );
    
        // Insert data into the users table
        User::updateOrCreate(
            ['email' => $request->emailid], // Ensure email is unique
            [
                'username' => $request->emailid, // Email as username
                'password' => Hash::make($request->regno), // Hash regno as password
                'role' => 'user', // Assign role
                'phone' => $request->conum ?? 0, // Store phone number if available
            ]
        );
    
        // Return with success message
        return redirect()->route('admin.students')->with('success', 'Student saved successfully!');
    }
    
    
    
    public function students()
{
    $students = Student::all(); // Fetch all students
    return view('admin.students', compact('students'));
}
public function viewStudents()
{
    $students = \DB::table('student')->get();
    return view('admin.view_students', compact('students'));
}
public function staff()
{
    $staffMembers = StaffTp::all(); // Fetch all staff from the database
    return view('admin.staff', compact('staffMembers')); // Pass data to the view
}
    
    public function storeStaff(Request $request) {
        Staff::updateOrCreate(['emp_number' => $request->emp_number], $request->all());
        return redirect()->route('admin.staff')->with('success', 'Staff saved successfully!');
    }
    
    // public function Courses(Request $request) {
    //     $request->validate([
    //         'courseId' => 'required',
    //         'courseName' => 'required'
    //     ]);
    
        // Course::updateOrCreate(
        //     ['courseId' => $request->courseId],
        //     ['courseName' => $request->courseName]
        // );
    
    //     return redirect()->route('admin.courses')->with('success', 'Course saved successfully!');
    // }
    
    public function storeBatch(Request $request) {
        Batch::updateOrCreate(['bno' => $request->bno, 'courseId' => $request->courseId], $request->all());
        return redirect()->route('admin.batches')->with('success', 'Batch saved successfully!');
    }
    
    public function updateUserData(Request $request) {
        User::updateOrCreate(['username' => $request->username], ['password' => bcrypt($request->password)]);
        return redirect()->route('admin.updateUser')->with('success', 'User updated successfully!');
    }
 

public function batches()
{
    $batches = Batch::all(); // Fetch all batches using the model
    return view('admin.batches', compact('batches'));
}

// courses new added
public function courses() {
    $courses = Course::all(); // Fetch all courses from DB
    return view('admin.course', compact('courses'));
}

public function storeCourse(Request $request) {
    // Validate the request
    $request->validate([
        'courseId' => 'required|unique:courses,courseId',
        'courseName' => 'required'
    ]);

    // Insert into the database
    Course::create([
        'courseId' => $request->courseId,
        'courseName' => $request->courseName
    ]);

    return redirect()->route('admin.courses')->with('success', 'Course added successfully!');
}

//********************............Update............********** old

public function updateUser()
{
    // Fetch all students
    $students = Student::all();

    return view('admin.update_user', compact('students'));
}

public function addStudentAsUser($regno)
{
    // Fetch student details
    $student = Student::where('regno', $regno)->first();

    if (!$student) {
        return redirect()->route('admin.updateUser')->with('error', 'Student not found.');
    }

    // Check if the student already exists in users table
    $existingUser = User::where('email', $student->emailid)->orWhere('username', $student->regno)->first();

    if (!$existingUser) {
        // Create a new user with default credentials
        User::create([
            'username' => $student->regno,  // You can change this to use phone instead
            'password' => Hash::make($student->regno), // Default password as regno
            'role' => 'user',
            'email' => $student->emailid,
            'phone' => $student->conum ?? '0000000000',
        ]);

        return redirect()->route('admin.updateUser')->with('success', 'Student added as a user successfully.');
    } else {
        return redirect()->route('admin.updateUser')->with('error', 'Student already exists as a user.');
    }
}
/*
public function showStudentUserForm($regno)
{
    $student = Student::where('regno', $regno)->first();

    if (!$student) {
        return redirect()->back()->with('error', 'Student not found.');
    }

    // Check if user already exists
    $existingUser = User::where('email', $student->emailid)->first();

    return view('admin.add-student-user', compact('student', 'existingUser'));
}*/
/*
public function showStudentUserForm($regno)
{
    $student = Student::where('regno', $regno)->first();

    if (!$student) {
        return redirect()->back()->with('error', 'Student not found.');
    }

    return view('admin.updateUser', compact('student'));
}


public function storeStudentAsUser(Request $request)
{
    $request->validate([
        'regno' => 'required|exists:student,regno',
        'username' => 'required|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|digits:10|unique:users,phone',
    ]);

    // Fetch student details
    $student = Student::where('regno', $request->regno)->first();

    // Create user
    User::create([
        'username' => $request->username,
        'password' => Hash::make($request->regno), // Default password as regno
        'role' => 'user',
        'email' => $request->email,
        'phone' => $request->phone,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('admin.updateUser')->with('success', 'Student added as a user successfully.');
}*/
}
