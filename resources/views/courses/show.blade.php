@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Course Details</h2>
    </div>
    <div class="card-body">
        <p><strong>Name:</strong> {{ $course->name }}</p>
        <p><strong>Duration:</strong> {{ $course->duration }}</p>
        <p><strong>Description:</strong> {{ $course->description }}</p>
        <p><strong>Teacher:</strong> {{ $course->teacher->name ?? 'N/A' }}</p>
        
        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
        
        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</div>
@endsection