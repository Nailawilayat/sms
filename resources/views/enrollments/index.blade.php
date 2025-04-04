@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Enrollments List</h2>
    </div>
    <div class="card-body">
        <a href="{{ route('enrollments.create') }}" class="btn btn-success btn-sm" title="Enroll Student">
            <i class="fa fa-plus" aria-hidden="true"></i> Enroll Student
        </a>
        <br/><br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 5%;">S.No</th>
                        <th style="width: 10%;">Std-Name</th>
                        <th style="width: 10%;">Course-Name</th>
                        <th style="width: 10%;">Enrollment-Date</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 10%;">Completion-Date</th>
                        <th style="width: 30%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $enrollment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ optional($enrollment->student)->name ?? 'N/A' }}</td>
                        <td>{{ optional($enrollment->course)->name ?? 'N/A' }}</td>
                        <td>{{ $enrollment->enrollment_date ? \Carbon\Carbon::parse($enrollment->enrollment_date)->format('Y-m-d') : 'N/A' }}</td>
                        <td>{{ $enrollment->status }}</td>
                        <td>
    {{ $enrollment->completion_date ?? \Carbon\Carbon::parse($enrollment->enrollment_date)->addMonths(3)->format('Y-m-d') }}
</td>

                        <td>
                            <!-- View Enrollment Button -->
                            <a href="{{ route('enrollments.show', $enrollment->id) }}" title="View Enrollment">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </button>
                            </a>

                            <!-- Edit Enrollment Button -->
                            <a href="{{ route('enrollments.edit', $enrollment->id) }}" title="Edit Enrollment">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <!-- Delete Enrollment Form -->
                            <form method="POST" action="{{ route('enrollments.destroy', $enrollment->id) }}" accept-charset="UTF-8" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Enrollment" onclick="return confirm('Are you sure you want to delete this enrollment?')">
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
