@extends('layouts.app')

@section('title')
    {{ $employee->name }}
@endsection

@section('content')
    <div class="container">
        <h1>{{ $employee->name }}</h1>
        
        @if ($payments->count())
            <ol>
                @foreach ($payments as $payment)
                    <li>
                        {{ $payment->payment_method }}
                        {{ $payment->amount_due }}
                        {{ $payment->currency }}
                        {{ $payment->description }}
                    </li>
                @endforeach
            </ol>
            {{$payments->links()}}
        @else
            <p>No payments</p>
        @endif
        
    </div>
@endsection