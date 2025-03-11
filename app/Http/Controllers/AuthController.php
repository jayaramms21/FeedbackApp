<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Ensure you have a view file: resources/views/auth/login.blade.php
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::where('username', $request->username)->first();
    
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
    
                \Log::info('User logged in:', ['id' => $user->id, 'role' => $user->role]); // Debugging
    
                if ($user->role === 'admin') {
                    return redirect('/admin/dashboard');
                } else {
                    return redirect('/user/dashboard');
                }
            } else {
                \Log::error('Password mismatch for user:', ['username' => $request->username]);
            }
        } else {
            \Log::error('User not found:', ['username' => $request->username]);
        }
    
        return back()->withErrors(['login_error' => 'Invalid username or password']);
    }
    
  /*  befor admin validate login 
  
  public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/user/dashboard');
            }
        }

        return back()->withErrors(['login_error' => 'Invalid username or password']);
    }
        */ 
/* Registration*/
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

     /*  commeted for tesion admin login
     
     User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hashing password before storing
            'role' => 'user', // Default role
        ]);
*/
        return redirect('/login')->with('success', 'Registration successful. Please log in.');
    }
  

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
