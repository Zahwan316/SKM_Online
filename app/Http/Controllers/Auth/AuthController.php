<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(auth()->guard()->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login berhasil');
        }

        return back()->withErrors(['email' => 'Email atau password salah'])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required','string','max:100'],
            'email'    => ['required','email','unique:users,email'],
            'password' => ['required','confirmed', Password::min(8)/* ->mixedCase() */],
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'hak_akses' => 'petugas',
        ]);

        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('success', 'Berhasil logout');
    }
}
