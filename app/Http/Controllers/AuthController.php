<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Support\ValidatedData;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.contents.login', [
            "title"=> "Login",
            'isAuthPage' => true,
            ]);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $cred = $request->validate([
            'email' => ['required','email:dns'],
            'password' => ['required']
        ]);

        //dd('Login Successful');
        if (Auth::attempt($cred)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
            
        }
            return back()->with('logError', 'Login Failed');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }

    public function forgot()
    {
        return redirect('auth.forgot');
    }
}
