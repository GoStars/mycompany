@extends('layouts.app')

@section('title')
    Edit User
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" value="{{$user->company}}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="activity" class="col-md-4 col-form-label text-md-right">{{ __('Activity') }}</label>

                            <div class="col-md-6">
                                <input id="activity" type="text" class="form-control{{ $errors->has('activity') ? ' is-invalid' : '' }}" name="activity" value="{{$user->activity}}">

                                @if ($errors->has('activity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('activity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update User') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{route('users.destroy', $user->id)}}">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete User') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection