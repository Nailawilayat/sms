@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Courses List</h2>
    </div>
    <div class="card-body">
        <a href="{{ route('courses.create') }}" class="btn btn-success btn-sm" title="Add New Course">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <br/><br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr> 
                      <th style="width: 5%;">S.No</th>
                      <th style="width: 10%;">Name</th>
                      <th style="width: 10%;">Duration</th>
                      <th style="width: 10%;">Description</th>
                      <th style="width: 10%;">Teacher</th>
                      <th style="width: 20%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->duration }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ $course->teacher->name ?? 'N/A' }}</td>

                        <td>
                            <!-- View Course Button -->
                            <a href="{{ route('courses.show', $course->id) }}" title="View Course">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </button>
                            </a>

                            <!-- Edit Course Button -->
                            <a href="{{ route('courses.edit', $course->id) }}" title="Edit Course">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <!-- Delete Course Form -->
                            <form method="POST" action="{{ route('courses.destroy', $course->id) }}" accept-charset="UTF-8" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Course" onclick="return confirm('Are you sure you want to delete this course?')">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
