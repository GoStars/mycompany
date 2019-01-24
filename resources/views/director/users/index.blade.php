@extends('layouts.starter')

@section('title')
    Users
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">{{ __(' Users') }}</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        
                        @if ($users->count())
                            <table id="usersTable" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>Name</th>
                                        <th>E-Mail Address</th>
                                        <th>Company</th>
                                        <th>Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->company }}</td>
                                        <td>{{ $user->activity }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>  
                            </table>
                            <div class="d-flex justify-content-end pt-2">
                                {{ $users->links() }}
                            </div>
                        @else
                            <p>No users</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection