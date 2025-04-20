<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
         // Check if the user is already logged in
    if (Auth::check()) {
        // If logged in, redirect to the main page
        return redirect()->route('main');
    }
        return view('front.default.auth.login');
    }

    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Check user credentials
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            // If login is successful, redirect to the dashboard or desired page
            return response()->json([
                'status' => true,
                'message' => 'Login successful!',
                'redirect' => route('main')  // Or any other route after login
            ]);
        } else {
            // If login fails, return an error response
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials. Please try again.'
            ], 401);
        }
    }
    public function logout()
{
    Auth::logout(); // Log out the user
    return redirect()->route('user.login'); // Redirect to the login page
}
}
