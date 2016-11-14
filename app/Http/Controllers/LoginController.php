<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect('admin');
        }
        
        return back()->with('failedLogin', 'Email or Password not found');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginForm');
    }
}
