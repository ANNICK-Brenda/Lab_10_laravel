<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Show the login page ("/")
     */
    public function showLogin()
    {
        return view('home');
    }

    /**
     * Handle login form submission
     */
    public function login(Request $request)
    {
        // Validate input (teacher style)
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Find user by name
        $user = User::where('name', $validated['name'])->first();

        // Check if user exists & password matches
        if ($user && Hash::check($validated['password'], $user->password)) {

            // Save session data
            session([
                'username' => $user->name,
                'user_id' => $user->id
            ]);

            return redirect('/page1');
        }

        // Wrong login
        return back()->with('error', 'Invalid name or password');
    }

    /**
     * Show the registration page ("/register")
     */
    public function showRegister()
    {
        return view('register');
    }

    /**
     * Handle registration form submission
     */
    public function register(Request $request)
    {
        // Validate inputs
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
        ]);

        // Create the user in the database
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Redirect back to login page
        return redirect('/')->with('success', 'Account created! Please login.');
    }

    /**
     * Protected page — only show if user is logged in
     */
    public function page1()
    {
        if (!session()->has('username')) {
            return view('notauth');
        }

        return view('page1', [
            'user' => session('username')
        ]);
    }

    /**
     * Logout user and clear session
     */
    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
