<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show the admin login form
    public function login()
    {
        return view('back-end.pages.auth.login');
    }

    // Handle admin login
    public function handleLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to admin dashboard
            return redirect()->intended(route('admin.dashboard'));
        }
        // Authentication failed, redirect back with error message
        return back()->withErrors(['error' => 'Invalid credentials']);
    }

    // Show the admin dashboard
    public function dashboard()
    {
        return view('back-end.pages.dashboard.dashboard');
    }

    // Logout admin
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
