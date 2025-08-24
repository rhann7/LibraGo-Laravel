<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|current_password',
            'password'         => 'required|string|min:8'
        ]);

        $request->user()->update(['password' => Hash::make($validated['password'])]);
        
        return response()->json(['status' => 'success'], 200);
    }
}