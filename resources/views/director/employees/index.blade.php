@extends('layouts.app')

@section('title')
    Employees
@endsection

@section('content')
<div class="container">
    <h1>Employees</h1>

    @if ($employees->count())
        <ul>
            @foreach ($employees as $employee)
                <li>
                    <a href="{{route('employees.show', $employee->id)}}">
                        {{ $employee->name }}
                    </a>
                </li>
            @endforeach
        </ul>
        {{$employees->links()}}
    @else
        <p>No employees</p>
    @endif

</div>
@endsection