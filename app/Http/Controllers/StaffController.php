<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = DB::table('staff_tp')->get();  // Fetch all staff details
        return view('admin.staff', compact('staffs'));
    }

    public function store(Request $request)
    {
        DB::table('staff_tp')->insert([
            'emp_number' => $request->emp_number,
            'emp_name' => $request->emp_name,
            'flag' => $request->flag
        ]);

        return redirect()->route('admin.staff')->with('success', 'Staff added successfully!');
    }
}

