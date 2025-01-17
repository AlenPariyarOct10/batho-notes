<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request['name'] = $request->input('username');

        $data = $request->validate([
            'name' => 'required|string|unique:users',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
        ]);

        try {
            // Create the user
            $user = User::create([
                'name' => $data['name'],
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            // Flash success message
            session()->flash('message', 'User registered successfully.');

            // Redirect to login page
            return redirect()->route('auth.login');
        } catch (\Exception $e) {
            // Flash error message
            session()->flash('message', 'Registration failed: ' . $e->getMessage());

            // Return back with error message
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

       if(Auth::attempt($validate)) {
            return redirect()->route('welcome');
       }else{

           return back()->withErrors(['message' => 'Please enter correct email and password.']);
       }
    }

    public function logout(Request $request)
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
