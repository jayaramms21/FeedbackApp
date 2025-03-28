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
use App\Models\Courses;
use App\Models\Batch;
use App\Models\User;
class AdminController extends Controller
{
    public function dashboard()
    {
        // Fetch all feedbacks
        $feedbacks = Feedback::with('user')->get();

        return view('admin.dashboard', compact('feedbacks'));
    }
    public function storeStudent(Request $request) {
        // Ensure required fields are available
        $request->validate([
            'regno' => 'required|string|unique:students,regno',
            'stname' => 'required|string',
            'emailid' => 'required|email|unique:students,emailid',
        ]);
    
        // Create or update student record
        $student = Student::updateOrCreate(
            ['regno' => $request->regno], 
            $request->all()
        );
    
        // Ensure `username` is explicitly included when creating a user
        User::updateOrCreate(
            ['username' => $request->stname], 
            [
                'username' => $request->stname, // Explicitly setting username
                'password' => bcrypt($request->regno), 
                'role' => 'user'
            ]
        );
    
        return redirect()->route('admin.students')->with('success', 'Student saved successfully!');
    }
    
    
    
    public function students()
{
    $students = Student::all(); // Fetch all students
    return view('admin.students', compact('students'));
}

    
    public function storeStaff(Request $request) {
        Staff::updateOrCreate(['emp_number' => $request->emp_number], $request->all());
        return redirect()->route('admin.staff')->with('success', 'Staff saved successfully!');
    }
    
    public function storeCourse(Request $request) {
        Course::updateOrCreate(['courseId' => $request->courseId], $request->all());
        return redirect()->route('admin.courses')->with('success', 'Course saved successfully!');
    }
    
    public function storeBatch(Request $request) {
        Batch::updateOrCreate(['bno' => $request->bno, 'courseId' => $request->courseId], $request->all());
        return redirect()->route('admin.batches')->with('success', 'Batch saved successfully!');
    }
    
    public function updateUserData(Request $request) {
        User::updateOrCreate(['username' => $request->username], ['password' => bcrypt($request->password)]);
        return redirect()->route('admin.updateUser')->with('success', 'User updated successfully!');
    }
}
