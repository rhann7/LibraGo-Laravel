@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
    <h1>User Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }} (User)</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button">
    </form>

    <a href="{{ route('user.show', Auth::user()) }}">Profile</a>
@endsection