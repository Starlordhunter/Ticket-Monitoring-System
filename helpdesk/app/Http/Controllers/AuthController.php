<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }  
      

    public function customLogin(Request $request)
    {
        static $email = "admin@admin.com";
        static $password = "password";

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (($request->input('email')===$email) and ($request->input('password')===$password)) {
            $request->session()->put('authenticated', time());
            return redirect()->intended('/');
        }
  
        return view('login');
    }

    

    public function signOut() {
        Session::flush();
        return Redirect('login');
    }
}