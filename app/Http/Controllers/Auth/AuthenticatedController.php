<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    public function create()
    {
        return view('Auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->user_type === 'doctor') {
                return redirect()->route('doctor.index');
            } elseif ($user->user_type === 'sick') {
                return redirect()->route('sick');
            } elseif ($user->user_type === 'pharmaceutical') {
                return redirect()->route('pharmaceutical');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors(['email' => 'User type is invalid.']);
            }
        }

        return back()->withErrors([
            'email' => 'هذه البيانات غير متطابقة مع سجلاتنا.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
