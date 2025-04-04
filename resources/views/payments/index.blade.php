@extends('layout')

@section('content')
<div class="card mt-4">
    <div class="card-header">
        <h2>Payments List</h2>
    </div>
    <div class="card-body">
        <a href="{{ route('payments.create') }}" class="btn btn-success btn-sm" title="Add Payment">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Payment
        </a>
        <br/><br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Course Name</th>
                        <th>Paid Date</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->enrollment->student->name ?? 'N/A' }}</td>
                            <td>{{ $payment->enrollment->course->name ?? 'N/A' }}</td>
                            <td>{{ $payment->paid_date }}</td>
                            <td>${{ number_format($payment->amount, 2) }}</td>
                            <td>
                                <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection