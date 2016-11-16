<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Registration;
use App\User;
use Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private $registration;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
        $this->middleware('guest');
    }

    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = $this->registration->registerNewUser($request->only(['name', 'email', 'password']));

        Auth::login($user);
        
        return redirect()->route('admin');
    }
}
