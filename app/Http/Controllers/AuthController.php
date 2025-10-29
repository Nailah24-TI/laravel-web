<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Proses login user
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Cek apakah email terdaftar
        $user = User::where('email', $request->email)->first();

        // Jika user ditemukan dan password sesuai
        if ($user && Hash::check($request->password, $user->password)) {

            // Simpan session login
            session([
                'user_id'    => $user->id,
                'user_name'  => $user->name,
                'user_email' => $user->email,
            ]);

            // Arahkan ke halaman dashboard
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        // Jika gagal login
        return redirect()->route('auth.index')->withErrors([
            'login' => 'Email atau password salah.',
        ])->withInput();
    }

    /**
     * Logout user
     */
    public function logout()
    {
        session()->flush();
        return redirect()->route('auth.index')->with('success', 'Logout berhasil!');
    }
}
