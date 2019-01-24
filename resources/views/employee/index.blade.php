@extends('layouts.starter')

@section('title')
    Payments
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">{{ __(' Payments') }}</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        
                        @if ($payments->count())
                            <table id="paymentsTable" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>Payment Method</th>
                                        <th>Amount Due</th>
                                        <th>Currency</th>
                                        <th>Description</th>
                                        <th>Payment Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->payment_method }}</td>
                                            <td>{{ $payment->amount_due }}</td>
                                            <td>{{ $payment->currency }}</td>
                                            <td>
                                                {{ str_limit($payment->description, 60, '') }}
                                                
                                                @if (!empty(strlen($payment->description) > 60) )
                                                    <span data-toggle="tooltip" title="{{ $payment->description }}"> ...</span>
                                                @endif
                                            </td>
                                            <td>{{ $payment->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end pt-2">
                                {{ $payments->links() }}
                            </div>
                        @else
                            <p>No payments</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection