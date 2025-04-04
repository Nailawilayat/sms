@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Payment Details</h2>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item"><strong>Enrollment ID:</strong> {{ $payment->enrollment_id }}</li>
            <li class="list-group-item"><strong>Paid Date:</strong> {{ $payment->paid_date }}</li>
            <li class="list-group-item"><strong>Amount:</strong> {{ number_format($payment->amount, 2) }}</li>
        </ul>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary mt-3">Edit</a>
    </div>
</div>
@endsection
