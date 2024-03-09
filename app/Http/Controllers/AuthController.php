<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function loginview()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        // $validatedData = $request->validate([
        //     'username' => 'string|max:255',
        //     'email' => 'nullable|string|email|unique:users,email|max:255',
        //     'password' => 'nullable|string|max:255',
        //     'phone' => 'nullable|string|max:20',
        //     'dob' => 'nullable|date',
        //     'gender' => 'nullable|string|in:Male,Female,Other',
        //     'image' => 'nullable|string|max:255',
        //     'google_id' => 'nullable|string|max:255',
        // ]);

        // try {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        Auth::login($user);

        return redirect('/')->with('success', 'User created successfully.');
        // } catch (\Exception $e) {
        // return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create user.']);
        // }
    }

    public function login()
    {

    }
}
