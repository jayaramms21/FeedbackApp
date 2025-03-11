<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ResetPasswordController extends Controller
{
    /**
     * Show the reset password form only if the user has a valid token.
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password')->with([
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * Handle password reset request.
     */
    public function reset(Request $request)
    {
        // Validate user input
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        // Check if the token exists in the password_resets table
        $resetRecord = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$resetRecord) {
            return back()->withErrors(['email' => 'Invalid or expired token.']);
        }

        // Update user's password
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            // Delete token from password_resets table after successful reset
            DB::table('password_resets')->where('email', $request->email)->delete();

            // Redirect to login with success message
            return redirect()->route('login')->with('status', 'Your password has been successfully updated. You can now log in.');
        }

        return back()->withErrors(['email' => 'User not found.']);
    }
}
