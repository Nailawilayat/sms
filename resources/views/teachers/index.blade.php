@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Teachers List</h2>
    </div>
    <div class="card-body">
        <a href="{{ route('teachers.create') }}" class="btn btn-success btn-sm" title="Add New Teacher">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <br/><br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 5%;">S.No</th>
                        <th style="width: 10%;">Name</th>
                        <th style="width: 15%;">Subject</th>
                        <th style="width: 10%;">Email</th>
                        <th style="width: 10%;">Phone</th>
                        <th style="width: 30%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->subject }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->phone }}</td>

                        <td>
                            <a href="{{ route('teachers.show', $teacher->id) }}" title="View Teacher">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </button>
                            </a>

                            <a href="{{ route('teachers.edit', $teacher->id) }}" title="Edit Teacher">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form method="POST" action="{{ route('teachers.destroy', $teacher->id) }}" accept-charset="UTF-8" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Teacher" onclick="return confirm(&quot;Are you sure you want to delete this teacher?&quot;)">
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
