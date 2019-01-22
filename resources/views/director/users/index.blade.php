@extends('layouts.app')

@section('title')
    Users
@endsection

@section('content')
<div class="container">
    <h1>Users</h1>

    @if ($users->count())
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }} <a href="{{ route('users.edit', $user->id)}}">Edit</a></li>
            @endforeach
        </ul>
        {{$users->links()}}
    @else
        <p>No users</p>
    @endif

</div>
@endsection