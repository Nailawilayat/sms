@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Edit Teacher</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PATCH')
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $teacher->name }}" required>
            </div>
            
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ $teacher->subject }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $teacher->email }}" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $teacher->phone }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        {{-- Back to Teachers Button --}}
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary mt-3">Back to Teachers</a>
    </div>
</div>

@endsection
