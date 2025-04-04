@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">Add Student</div>
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

        <form action="{{ route('students.store') }}" method="post"> {{-- 🔥 Fixed: Correct Route Name --}}
            {!! csrf_field() !!}
            
            <label>Name</label><br>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"><br> {{-- Keep previous input if validation fails --}}
            
            <label>Address</label><br>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}"><br>
            
            <label>Mobile</label><br>
            <input type="text" name="mobile" id="mobile" class="form-control" value="{{ old('mobile') }}"><br>
            
            <input type="submit" value="Save" class="btn btn-success"><br>
        </form>
    </div>
</div>

@stop
