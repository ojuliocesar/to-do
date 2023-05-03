<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.main');
    }

    public function loginAction(Request $r)
    {
        $loginData = $r->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        
        $authUser = Auth::attempt($loginData);

        if ($authUser) {
            
            return redirect(route('home'));
        } else {
            
            return redirect(route('login'))->withErrors('E-mail ou Senha inválidos! Verifique e tente Novamente');
        }

    }

    public function register()
    {
        if (Auth::check()) {

            return redirect()->route('home');
        }

        return view('auth.register');
    }

    public function registerAction(Request $r)
    {

        $dataAuth = $r->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed'
        ]);

        $password = $dataAuth['password'];

        $dataAuth['password'] = Hash::make($dataAuth['password']);
        
        User::create($dataAuth);

        $dataAuth['password'] = $password;

        Auth::attempt($dataAuth);

        return redirect(route('home'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
