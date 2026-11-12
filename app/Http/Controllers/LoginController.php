<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ログイン画面を出す
    public function create()
    {
        return view('auth.login');
    }

    // ログインする
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/cafes');
        }

        return back()->withErrors([
            'email' => 'メールアドレスかパスワードが違います。',
        ])->onlyInput('email');
    }

    // ログアウトする
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('cafes.index');
    }
}
