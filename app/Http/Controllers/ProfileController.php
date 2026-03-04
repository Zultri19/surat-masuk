<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        /** @var User $user */
        $user = Auth::user();

        // Update nama
        $user->name = $request->name;

        // Jika upload foto baru
        if ($request->hasFile('photo')) {

            // Hapus foto lama jika ada
            if ($user->photo && Storage::exists('public/profile/' . $user->photo)) {
                Storage::delete('public/profile/' . $user->photo);
            }

            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('profile', $filename, 'public');

            $user->photo = $filename;
        }

        $user->save();

        return back()->with('success', 'Profile berhasil diupdate');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:6|confirmed',
        ]);

        /** @var User $user */
        $user = Auth::user();

        // Cek password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Password lama tidak sesuai.'
            ]);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // 🔐 Logout paksa setelah ganti password
        Auth::logout();

        return redirect()->route('login')
            ->with('success', 'Password berhasil diganti. Silakan login kembali.');
    }

    public function passwordForm()
    {
        return view('profile.password');
    }
}
