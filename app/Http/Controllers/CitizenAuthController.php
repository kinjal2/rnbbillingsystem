<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomerDetail;

class CitizenAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.citizenlogin'); // Create this view
    }

    /**
     * Handle citizen login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string', // Mobile or email
            'password' => 'nullable|string', // Password for login
            'otp' => 'nullable|string', // OTP for login
        ]);

        // Attempt password login
        if ($request->filled('password')) {
            $user = CustomerDetail::where('email', $request->identifier)
                        ->orWhere('mobile', $request->identifier)
                        ->first();

            if ($user && Hash::check($request->password, $user->password)) {
                Auth::guard('citizen')->login($user);
                return redirect()->intended('citizen/dashboard'); // Redirect after successful login
            }

            return redirect()->back()->withErrors(['identifier' => 'Invalid credentials.'])->withInput();
        }

        // Attempt OTP login (you should implement OTP sending and verification)
        if ($request->filled('otp')) {
            // Logic for OTP verification
            // Assuming you have a method to verify OTP
            if ($this->verifyOtp($request->identifier, $request->otp)) {
                $user = CustomerDetail::where('email', $request->identifier)
                            ->orWhere('mobile', $request->identifier)
                            ->first();

                Auth::guard('citizen')->login($user);
                return redirect()->intended('citizen/dashboard'); // Redirect after successful login
            }

            return redirect()->back()->withErrors(['otp' => 'Invalid OTP.'])->withInput();
        }

        return redirect()->back()->withErrors(['identifier' => 'Please provide either a password or an OTP.'])->withInput();
    }

    /**
     * Logout the citizen user.
     */
    public function logout()
    {
        Auth::guard('citizen')->logout();
        return redirect('/'); // Redirect to home or login page
    }

    /**
     * Verify OTP logic (example placeholder).
     */
    protected function verifyOtp($identifier, $otp)
    {
        // Implement your OTP verification logic here
        // Return true if valid, false otherwise
        return true; // Placeholder; implement actual OTP verification
    }
}
