@extends('layouts.app')

@section('title', 'User Detail')

@section('content')
    <h1>User Detail</h1>
    
    <p>Avatar <img src="{{ asset('storage/' . $user->avatar) }}" width="50"> </p>
    <p>Name {{ $user->name }}</p>
    <p>Username {{ $user->username }}</p>
    <p>Email {{ $user->email }}</p>
    <p>Age {{ $user->age }}</p>
    <p>Bio {{ $user->bio }}</p>
    <p>Gender {{ $user->gender }}</p>
    <p>Role {{ $user->role }}</p>
@endsection