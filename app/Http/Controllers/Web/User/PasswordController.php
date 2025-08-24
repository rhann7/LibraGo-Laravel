<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('user.edit-password', compact('user'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|current_password',
            'password'         => 'required|string|min:8|confirmed'
        ]);

        $request->user()->update(['password' => Hash::make($validated['password'])]);
        
        return redirect()->route('user.show', $request->user())->with('success', 'Password updated successfully.');
    }
}