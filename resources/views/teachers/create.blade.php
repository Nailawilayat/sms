@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Add New Teacher</h2>
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

        {{-- Form to add teacher --}}
        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label><br>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required><br>
            </div>
            
            <div class="form-group">
                <label for="subject">Subject</label><br>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') }}" required><br>
            </div>

            <div class="form-group">
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required><br>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label><br>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required><br>
            </div>

            <button type="submit" class="btn btn-success">Add Teacher</button>
        </form>
    </div>
</div>

@endsection
