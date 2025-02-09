<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Add this at the top

class UserController extends Controller
{

    function login(Request $req) {
        // Validate the request data
        $req->validate([
            'email' => 'required|email', // Ensure email is valid
            'password' => 'required', // Password is required
        ]);
    
        // Find the user by email
        $user = User::where('email', $req->email)->first();
    
        if ($user) {
            // Compare the password using Hash::check()
            if (Hash::check($req->password, $user->password)) {
                $req->session()->put('user', $user->email);
                return redirect('success');
            } else {
                return back()->with('error', 'Incorrect password');
            }
        } else {
            return back()->with('error', 'User not found');
        }
    }
    
    function signup(Request $req) {
        // Validate the request data
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',  // Ensure the password is confirmed
        ]);
    
        // Create a new user and hash the password before saving
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);  // Hash the password
        $user->save();
    
        if ($user) {
            return redirect('login');
        } else {
            return back()->with('error', 'User not created');
        }
    }
    
    function logout(){
        session()->pull('user');
        return redirect('login');
    }
}
