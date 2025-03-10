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

class AdminController extends Controller
{
    public function dashboard()
    {
        // Fetch all feedbacks
        $feedbacks = Feedback::with('user')->get();

        return view('admin.dashboard', compact('feedbacks'));
    }
}
