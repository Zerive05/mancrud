<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Login()
    {
        return view('login');
    }
    
    public function loginproses(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        }
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect('login');
    }

    public function register()
    {
        return view('register');
    }

    public function registeruser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return view('login');
    }

    public function lupapassword()
    {
        return view('lupapassword');
    }
}
