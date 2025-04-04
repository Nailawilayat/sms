@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Add New Course</h2>
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

        <form action="{{ route('courses.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label><br>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required><br>
            </div>

            <div class="form-group">
                <label for="duration">Duration</label><br>
                <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration') }}" required><br>
            </div>

            <div class="form-group">
                <label for="description">Description</label><br>
                <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea><br>
            </div>

            {{-- Show Teacher ID Without Dropdown --}}
            <div class="form-group">
    <label for="teacher_id">Teacher</label><br>
    <select name="teacher_id" id="teacher_id" class="form-control" required>
        <option value="" disabled selected>Select a Teacher</option> <!-- ✅ Default Option Added -->
        @foreach ($teachers as $teacher)
            <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                {{ $teacher->name }}
            </option>
        @endforeach
    </select><br>
</div>



            <button type="submit" class="btn btn-success">Add Course</button>

        </form>
    </div>
</div>
@endsection
