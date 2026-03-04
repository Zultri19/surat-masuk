<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    
    public function authenticate(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            $credentials = $request->only('email', 'password');

            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->role == 'operator') {
                return redirect()->route('operator.dashboard');
            }

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

     public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function showRegister()
    {
    return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'user';

        User::create($data);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }
}