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
//use App\Models\Batch;
class AdminController extends Controller
{
    public function dashboard()
    {
        // Fetch all feedbacks
        $feedbacks = Feedback::with('user')->get();

        return view('admin.dashboard', compact('feedbacks'));
    }
    public function storeStudent(Request $request)
{
    $request->validate([
        'regno' => 'required|unique:student,regno',
        'stname' => 'required',
        'emailid' => 'required|email',
    ]);

    \DB::table('student')->insert([
        'regno' => $request->regno,
        'stname' => $request->stname,
        'emailid' => $request->emailid,
        'sex' => $request->sex,
        'dob' => $request->dob,
        'guardian' => $request->guardian,
        'conum' => $request->conum,
        'courseName' => $request->courseName,
        'bno' => $request->bno,
        'strtdt' => $request->strtdt,
        'grnstatus' => $request->grnstatus,
        'tm' => $request->tm,
        'rollNo' => $request->rollNo,
        'remark' => $request->remark,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Student details saved successfully!');
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


}
