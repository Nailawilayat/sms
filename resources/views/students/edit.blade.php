@extends('layout')

@section('content')
 
<div class="card">
  <div class="card-header">Edit Student</div>
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

      <form action="{{ route('students.update', $student->id) }}" method="post"> {{-- 🔥 Fixed Route --}}
        @csrf
        @method("PATCH")
        
        <input type="hidden" name="id" value="{{ $student->id }}" /> {{-- Fixed Hidden Field --}}
        
        <label>Name</label><br>
        <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}" class="form-control"><br> {{-- Retain old value on validation failure --}}
        
        <label>Address</label><br>
        <input type="text" name="address" id="address" value="{{ old('address', $student->address) }}" class="form-control"><br>
        
        <label>Mobile</label><br>
        <input type="text" name="mobile" id="mobile" value="{{ old('mobile', $student->mobile) }}" class="form-control"><br>
        
        <input type="submit" value="Update" class="btn btn-success"><br>
      </form>

      {{-- Back Button --}}
      <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to Students</a>
   
  </div>
</div>
 
@stop
