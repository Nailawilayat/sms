@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Enroll Student</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('enrollments.store') }}">
            @csrf
            
            <!-- Student Dropdown -->
            <div class="form-group">
                <label for="student_id">Student Name</label>
                <select name="student_id" id="student_id" class="form-control">
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Course Dropdown -->
            <div class="form-group">
                <label for="course_id">Course Name</label>
                <select name="course_id" id="course_id" class="form-control">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="enrollment_date">Enrollment Date</label>
                <input type="date" name="enrollment_date" id="enrollment_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="completed">Completed</option>
                    <option value="dropped">Dropped</option>
                </select>
            </div>

            <div class="form-group">
                <label for="completion_date">Completion Date</label>
                <input type="date" name="completion_date" id="completion_date" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Enroll Student</button>
        </form>
    </div>
</div>

@endsection
