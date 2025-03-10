<?php

namespace App\Http\Controllers; // ✅ Namespace must be immediately after the PHP opening tag

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please log in first.');
        }

        // Get logged-in user ID
        $userId = Auth::id();

        // Fetch user details with batch info
        $user = DB::table('users')
            ->leftJoin('student', 'users.email', '=', 'student.emailid')
            ->leftJoin('batch', function ($join) {
                $join->on('student.courseName', '=', 'batch.courseName')
                     ->on('student.bno', '=', 'batch.bno');
            })
            ->select('users.*', 'batch.courseName', 'batch.bno')
            ->where('users.id', $userId)
            ->first();

        if (!$user) {
            return redirect('/login')->with('error', 'User details not found in the database.');
        }

        return view('user.dashboard', compact('user'));
    }
}
