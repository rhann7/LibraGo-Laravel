@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <h1>Users</h1>

    <a href="{{ route('admin.users.create') }}">Create New User</a>

    <table border="1" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Avatar</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Age</th>
            <th>Bio</th>
            <th>Gender</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        @forelse ($users as $index => $user)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="50">
                @else
                    No avatar
                @endif
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->age }}</td>
            <td>{{ $user->bio }}</td>
            <td>{{ ucfirst($user->gender) }}</td>
            <td>{{ ucfirst($user->role) }}</td>
            <td>
                <a href="{{ route('admin.users.show', $user) }}">Show</a> | 
                <a href="{{ route('admin.users.edit', $user) }}">Edit</a> | 
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">No users found</td>
        </tr>
        @endforelse
    </table>
@endsection