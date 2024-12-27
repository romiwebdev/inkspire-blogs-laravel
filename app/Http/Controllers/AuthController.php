<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showRegisterForm()
{
    return view('auth.register');
}

    // Fungsi untuk registrasi user baru
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    try {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Simpan password tanpa hashing
            'role' => 'author', // Default role
        ]);
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    } catch (\Exception $e) {
        return back()->withErrors(['registration' => 'Registration failed. Please try again.']);
    }
}

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Ambil user berdasarkan email
    $user = User::where('email', $request->email)->first();

    if ($user && $user->password === $request->password) {
        // Login manual
        Auth::login($user);

        // Redirect ke dashboard sesuai role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'author') {
            return redirect()->route('author.dashboard');
        }
    }

    // Jika login gagal
    return back()->withErrors(['email' => 'Invalid credentials']);
}

    // logout
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('frontend.index')->with('success', 'You have been logged out successfully');
}
}
