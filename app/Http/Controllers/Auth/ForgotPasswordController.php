<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    /**
     * Show Forgot Password form.
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Validate user email & phone before allowing password reset.
     */
    public function validateUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'phone' => 'required|exists:users,phone',
        ]);

        // Redirect directly to reset password form
        return redirect()->route('password.reset.form', ['email' => $request->email]);
    }

    /**
     * Show Reset Password Form (without token validation).
     */
    public function showResetPasswordForm(Request $request)
    {
        return view('auth.reset-password', [
            'email' => $request->email,
        ]);
    }

    /**
     * Update User Password in `users` Table Directly.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Find user by email and update password
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('login')->with('status', 'Your password has been successfully updated.');
        }

        return back()->withErrors(['email' => 'User not found.']);
    }
}
