
<?php

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please log in first.');
        }

        return view('dashboard'); // Ensure this matches your Blade template filename
    }
}
dd(Auth::user());

