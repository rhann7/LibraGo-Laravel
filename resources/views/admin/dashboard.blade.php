@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }} (Admin)</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        
        <button type="submit">Logout</button">
    </form>

    <a href="{{ route('admin.users.index') }}">Users</a>
@endsection