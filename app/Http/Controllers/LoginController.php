<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

// use Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function  authenticate(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required',],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            Alert::success('Congrats', 'Login Berhasil');
            return redirect('/');
        }
        Alert::warning('Warning', 'Password atau Email Salah');
        return redirect('/login');
  
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}
