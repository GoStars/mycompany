@extends('layouts.starter')

@section('title')
    Employees
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">{{ __(' Employees') }}</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        @if ($employees->count())
                            <table id="employeesTable" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th class="align-middle" rowspan="2">Name</th>
                                        <th class="align-middle" rowspan="2">E-Mail Address</th>
                                        <th class="align-middle" rowspan="2">Today's Payments</th>
                                        <th colspan="3">Today's Amount Due</th>
                                    </tr>
                                    <tr>
                                        <th>Hryvnia</th>
                                        <th>Dollar</th>
                                        <th>Euro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>
                                                <a href="{{route('employees.show', $employee->id)}}">
                                                    {{ $employee->name }}
                                                </a>
                                            </td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->payments->count() }}</td>
                                            <td>
                                                {{ $employee->payments
                                                    ->where('currency', '=', 'Hryvnia')
                                                    ->sum('amount_due') }}
                                            </td>
                                            <td>
                                                {{ $employee->payments
                                                    ->where('currency', '=', 'Dollar')
                                                    ->sum('amount_due') }}
                                            </td>
                                            <td>
                                                {{ $employee->payments
                                                    ->where('currency', '=', 'Euro')
                                                    ->sum('amount_due') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end pt-2">
                                {{ $employees->links() }}
                            </div>
                        @else
                            <p>No employees</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection