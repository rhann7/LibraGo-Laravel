@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <h1>Create User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        
        <input type="text" name="name" placeholder="Name"><br>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <select name="role">
            <option value="user">User</option>
            <option value="author">Author</option>
            <option value="admin">Admin</option>
        </select><br>
        <button type="submit">Save</button>
    </form>
@endsection