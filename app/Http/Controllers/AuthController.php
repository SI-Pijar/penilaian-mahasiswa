<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login', ['title' => 'Masuk']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('ingat'))) {
            $request->session()->regenerate();
 return redirect()->route('dashboard')->with('success', 'Selamat datang, ' . Auth::user()->name . '!');
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah.'])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('register', ['title' => 'Daftar Akun']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'npm' => 'required|exists:mahasiswa,npm',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $mahasiswa = Mahasiswa::where('npm', $request->input('npm'))->first();

        if ($mahasiswa->user_id) {
            return back()->withErrors(['npm' => 'NPM ini sudah memiliki akun. Silakan masuk.'])->onlyInput('npm', 'email');
        }

        $user = User::create([
            'name' => $mahasiswa->nama,
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'mahasiswa',
        ]);

        $mahasiswa->update(['user_id' => $user->id]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Akun berhasil dibuat. Selamat datang, ' . $user->name . '!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Kamu sudah keluar dari aplikasi.');
    }
}
