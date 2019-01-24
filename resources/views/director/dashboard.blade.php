@extends('layouts.starter')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <p class="card-text">This is your dashboard.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection