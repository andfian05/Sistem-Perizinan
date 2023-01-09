<?php

namespace App\Http\Controllers;

use App\Models\Outing;
use App\Models\TabelOuting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        return view('welcome',[
            'title' => ['Aplikasi Perizinan Mahasantri']
        ]);
    }

    public function authanticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

       if(Auth::attempt($credentials)){
           $request->session()->regenerate();
           return redirect()->intended('/welcome');

       }

       return back()->with('loginError', 'Password / Username Tidak Terdaftar');
    }

    public function success()
    {
        return view('page.welcome',[
            'title' => ['Informasi Keluar Asrama'],
            'outing' => Outing::latest()->get(),
            'tab_outing' => TabelOuting::latest()->get(),
            'user' => User::where('level','mahasantri')->filter(request(['search']))->get(),
            'thereout' => User::where('level','mahasantri')->filter(request(['search']))->get()
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
