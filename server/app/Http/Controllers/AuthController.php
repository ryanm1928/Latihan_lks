<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'username'  =>  'required',
            'password'  =>  'required',
        ]);

        $cred = (object) $request->only('username', 'password');
            
        if(Auth::attempt(['username' => $cred->username, 'password' => $cred->password])) {
            return redirect(route('home'));
        } else {
            return redirect(route('login'))->with("error", "Username atau Password anda salah");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/home');
    }
}
