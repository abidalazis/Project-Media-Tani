<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
      return view('auth.login');
    }

    public function loginAuth(Request $request)
    {
     $login = $request->validate([
        'email' => 'required|email',
            'password' => 'required'
      ]);

      if (auth()->attempt($login)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }
    return back()->with([  
        'loginError' => 'email atau password salah'
    ]);
    }

    public function logout(Request $request)
    {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/login');
    }
}
