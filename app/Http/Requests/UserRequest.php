<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users,username',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ];

        if (Auth::check() && Auth::user()->isAdmin()) {
            $rules['role'] = 'required|in:admin,user';
        }

        if ($this->method() == 'PUT') {
            $rules['name']     = 'nullable|string|max:255';
            $rules['username'] = 'nullable|string|max:50|unique:users,username,' . $this->route('user')->id;
            $rules['email']    = 'nullable|email|max:255|unique:users,email,' . $this->route('user')->id;
            $rules['password'] = 'nullable|string|min:8';
            $rules['avatar']   = 'nullable|image|max:2048';
            $rules['bio']      = 'nullable|string|max:500';
            $rules['gender']   = 'nullable|in:male,female';
        }

        return $rules;
    }
}
