<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerAuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check() && Auth::user()->role !== 'admin') {
            return redirect()->route('clientHome');
        }

        $data = [
            'shop' => Shop::first(),
            'title' => 'Login'
        ];
        return view('client.auth.login', $data);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');
        $remember    = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Admin yang login lewat halaman customer → arahkan ke panel admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('home');
            }

            return redirect()->route('clientHome')
                ->with('success', 'Selamat datang kembali, ' . Auth::user()->name . '!');
        }

        return redirect()->back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->withInput();
    }

    public function showRegister()
    {
        if (Auth::check() && Auth::user()->role !== 'admin') {
            return redirect()->route('clientHome');
        }

        $data = [
            'shop' => Shop::first(),
            'title' => 'Daftar Akun'
        ];
        return view('client.auth.register', $data);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:50|unique:users,name',
            'full_name' => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:8|confirmed',
        ], [
            'name.required'      => 'Username wajib diisi.',
            'name.unique'        => 'Username sudah digunakan.',
            'full_name.required' => 'Nama lengkap wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.unique'       => 'Email sudah terdaftar.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name'      => $request->name,
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => 'customer',
        ]);

        Auth::login($user);

        return redirect()->route('clientHome')
            ->with('success', 'Akun berhasil dibuat! Selamat datang, ' . $user->name . '!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('clientHome')
            ->with('success', 'Berhasil logout.');
    }
}
