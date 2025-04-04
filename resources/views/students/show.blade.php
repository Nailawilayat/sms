@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Student Details</h2>
    </div>
    <div class="card-body">
        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Address:</strong> {{ $student->address }}</p>
        <p><strong>Mobile:</strong> {{ $student->mobile }}</p>

        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Students</a>

        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</div>
@endsection
