@extends('layouts.app')

@section('title', 'Edit My Profile')

@section('content')
    <h1>Edit My Profile</h1>

    <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Name </label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}">
        <br>

        <label>Username </label>
        <input type="text" name="username" value="{{ old('username', $user->username) }}">
        <br>

        <label>Email </label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}">
        <br>

        <label>Password </label>
        <input type="password" name="password">
        <br>

        <label>Age </label>
        <input type="number" name="age" value="{{ old('age', $user->age) }}">
        <br>

        <label>Bio </label>
        <textarea name="bio">{{ old('bio', $user->bio) }}</textarea>
        <br>

        <label>Gender </label>
        <select name="gender">
            <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
        </select>
        <br>

        <label>Avatar </label>
        <input type="file" name="avatar">
        @if($user->avatar)
            <p>Current Avatar: <img src="{{ asset('storage/' . $user->avatar) }}" width="50"></p>
        @endif
        <br>

        <button type="submit">Update</button>
    </form>
@endsection