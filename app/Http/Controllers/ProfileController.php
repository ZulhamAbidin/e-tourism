<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

     public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'current_password' => 'required_with:password|string|min:8',
        ]);

        // Validasi password lama
        if ($request->filled('current_password') && !Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided current password is incorrect.']);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        Auth::logout(); // Logout pengguna setelah berhasil memperbarui profil

        return redirect()->route('login')->with('success', 'Profile updated successfully. You have been logged out for security reasons.');
    }
}

