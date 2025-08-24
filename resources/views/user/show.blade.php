@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <h1>My Profile</h1>

    @if($user->avatar)
        <p>Avatar <img src="{{ asset('storage/' . $user->avatar) }}" width="80" class="rounded-full"></p>
    @endif

    <p>Name {{ $user->name }}</p>
    <p>Username {{ $user->username }}</p>
    <p>Email {{ $user->email }}</p>
    <p>Age {{ $user->age ?? '-' }}</p>
    <p>Bio {{ $user->bio ?? '-' }}</p>
    <p>Gender {{ $user->gender ?? '-' }}</p>

    @if (Auth::id() === $user->id)
        <a href="{{ route('user.edit', $user) }}">Edit Profile</a>
    @endif
@endsection