@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <ul>
        <li><a href="{{ route('director.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('users') }}">Users</a></li>
        <li><a href="{{ route('employees') }}">Employees</a></li>
        <li><a href="{{ route('employees.create') }}">Add employee</a></li>
    </ul>
</div>
@endsection