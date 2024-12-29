<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function login(Request $req){
        // print_r($req->input());
        $user = User::where('email', $req->email)->first();

        if ($user) {
            if ( $user->password == $req->password ) {
                $req->session()->put('user', $user->email);
                return redirect('success');
                // print_r($user);
            } else {
                return back()->with('error', 'Incorrect password');
            }
        } else {
            return back()->with('error', 'user not found');
        }
    }

    function signup(Request $req){
        // print_r($req->input());
        $user = User::where('email', $req->email)->first();
        if ($user) {
            if ( $user->password == $req->password ) {
                return redirect('success');
            } else {
                return back()->with('error', 'Incorrect password');
            }
        } else {
            return back()->with('error', 'user not found');
        }
    }
}
