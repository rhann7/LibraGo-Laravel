<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        switch (Auth::user()->role) {
            case 'admin':
                return view('admin.dashboard');
            case 'author':
                return view('author.dashboard');
            default:
                return view('user.dashboard');
        }
    }
}