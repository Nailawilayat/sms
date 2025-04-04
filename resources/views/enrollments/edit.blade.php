@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Edit Enrollment</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="student_id" class="form-label">Student</label>
                <select class="form-control" name="student_id" required>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ $student->id == $enrollment->student_id ? 'selected' : '' }}>
                            {{ $student->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select class="form-control" name="course_id" required>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ $course->id == $enrollment->course_id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="enrollment_date" class="form-label">Enrollment Date</label>
                <input type="date" class="form-control" name="enrollment_date" value="{{ $enrollment->enrollment_date }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status">
                    <option value="Active" {{ $enrollment->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Completed" {{ $enrollment->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Dropped" {{ $enrollment->status == 'Dropped' ? 'selected' : '' }}>Dropped</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="completion_date" class="form-label">Completion Date</label>
                <input type="date" class="form-control" name="completion_date" value="{{ $enrollment->completion_date }}">
            </div>
            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Update enrollment</button>
                <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Back to Enrollment</a>
            </div>
        </form>
    </div>
</div>


@endsection


