@extends('layout')

@section('content')

<div class="card" style="width: 100%;"> <!-- Width increase here -->
    <div class="card-header">
        <h2>Teacher Details</h2>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $teacher->name }}" disabled>
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" value="{{ $teacher->subject }}" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $teacher->email }}" disabled>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $teacher->phone }}" disabled>
        </div>

        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary">Edit</a>
        
        {{-- Delete Teacher Form --}}
        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
        </form>

        {{-- Back to Teachers Button --}}
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary mt-3">Back to Teachers</a>
    </div>
</div>

@endsection
