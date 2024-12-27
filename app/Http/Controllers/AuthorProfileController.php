<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorProfileController extends Controller
{
    /**
     * Tampilkan halaman edit profil.
     */
    public function edit()
    {
        return view('author.profile.edit');
    }

    /**
     * Update profil pengguna.
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed', // pastikan password valid jika ada
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Memeriksa apakah password diisi dan valid
        if ($request->filled('password')) {
            // Hanya update password jika password baru tidak sama dengan password default (misalnya 'password')
            if ($request->input('password') === 'password') {
                return redirect()->route('author.profile.edit')->with('error', 'Password cannot be the default value.');
            }

            // Jika password baru valid, enkripsi password dan perbarui
            $user->password = $request->input('password');
        }

        // Simpan perubahan ke database
        $user->save();

        // Redirect kembali ke halaman edit dengan pesan sukses
        return redirect()->route('author.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
