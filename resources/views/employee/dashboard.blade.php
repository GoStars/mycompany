@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <ul>
        <li><a href="{{ route('employee.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('payments') }}">Payments</a></li>
        <li><a href="{{ route('payments.create') }}">Add payment</a></li>
    </ul>
   
</div>
@endsection