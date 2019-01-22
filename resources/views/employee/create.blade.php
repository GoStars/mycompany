@extends('layouts.app')

@section('title')
    Create Payment
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Create Payment') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('payments') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

                            <div class="col-md-6">
                                <input id="payment_method" type="radio" class="form-control{{ $errors->has('payment_method') ? ' is-invalid' : '' }}" name="payment_method" value="Credit Card" required>Credit Card
                                <input id="payment_method" type="radio" class="form-control{{ $errors->has('payment_method') ? ' is-invalid' : '' }}" name="payment_method" value="Cash" required>Cash

                                @if ($errors->has('payment_method'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('payment_method') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount_due" class="col-md-4 col-form-label text-md-right">{{ __('Amount Due') }}</label>

                            <div class="col-md-6">
                                <input id="amount_due" type="text" class="form-control{{ $errors->has('amount_due') ? ' is-invalid' : '' }}" name="amount_due" value="{{ old('amount_due') }}" required>

                                @if ($errors->has('amount_due'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amount_due') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="currency" class="col-md-4 col-form-label text-md-right">{{ __('Currency') }}</label>

                            <div class="col-md-6">
                                <select id="currency" class="form-control{{ $errors->has('currency') ? ' is-invalid' : '' }}" name="currency" required>
                                    <option value="Hryvnia">Hryvnia</option>
                                    <option value="Dollar">Dollar</option>
                                    <option value="Euro">Euro</option>
                                </select>

                                @if ($errors->has('currency'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('currency') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="10" cols="50">{{ old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Payment') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection