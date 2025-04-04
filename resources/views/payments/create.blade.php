@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Add New Payment</h2>
    </div>
    <div class="card-body">
        {{-- Show Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('payments.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="enrollment_id">Enrollment</label><br>
                <select name="enrollment_id" id="enrollment_id" class="form-control" required>
                    <option value="" disabled selected>Select Enrollment</option>
                    @foreach ($enrollments as $enrollment)
                        <option value="{{ $enrollment->id }}" {{ old('enrollment_id') == $enrollment->id ? 'selected' : '' }}>
                            {{ $enrollment->student->name }} - {{ $enrollment->course->name }}
                        </option>
                    @endforeach
                </select><br>
            </div>

            <div class="form-group">
                <label for="paid_date">Paid Date</label><br>
                <input type="date" name="paid_date" id="paid_date" class="form-control" value="{{ old('paid_date') }}" required><br>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label><br>
                <input type="number" name="amount" id="amount" class="form-control" step="0.01" value="{{ old('amount') }}" required><br>
            </div>

            <button type="submit" class="btn btn-success">Add Payment</button>
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
