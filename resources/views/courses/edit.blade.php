@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit Course</h2>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $course->name) }}" required>
            </div>
            
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration', $course->duration) }}" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $course->description) }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="teacher_id">Teacher</label>
                <select name="teacher_id" id="teacher_id" class="form-control" required>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Update Course</button>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
            </div>
        </form>
    </div>
</div>
@endsection
