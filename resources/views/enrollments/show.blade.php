@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Enrollment Details</h2>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Student Name:</strong> {{ $enrollment->student->name ?? 'N/A' }}
        </div>
        <div class="mb-3">
            <strong>Course Name:</strong> {{ $enrollment->course->name ?? 'N/A' }}
        </div>
        <div class="mb-3">
            <strong>Enrollment Date:</strong> 
            {{ $enrollment->enrollment_date ? \Carbon\Carbon::parse($enrollment->enrollment_date)->format('Y-m-d') : 'N/A' }}
        </div>
        <div class="mb-3">
            <strong>Status:</strong> {{ $enrollment->status }}
        </div>
        <div class="mb-3">
            <strong>Completion Date:</strong> 
            {{ $enrollment->completion_date ? \Carbon\Carbon::parse($enrollment->completion_date)->format('Y-m-d') : 'N/A' }}
        </div>

        <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Back to Enrollment</a>
        <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-primary">Edit</a>
    </div>
</div>

@endsection
