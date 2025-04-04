<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $enrollments = Enrollment::with(['student', 'course'])->get();
        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $students = Student::all();
        $courses = Course::all();

        return view('enrollments.create', compact('students', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation rules including 'after_or_equal' for completion_date
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',
            'status' => 'required|in:active,completed,dropped',
            'completion_date' => 'nullable|date|after_or_equal:enrollment_date'
        ]);

        // Create a new enrollment
        Enrollment::create([
            'student_id' => $validatedData['student_id'],
            'course_id' => $validatedData['course_id'],
            'enrollment_date' => $validatedData['enrollment_date'] ?? now(), // Ensure enrollment date is set
            'status' => $validatedData['status'],
            'completion_date' => $validatedData['completion_date'] ?? null // Default to null if not provided
        ]);

        // Redirect back to enrollments index with a success message
        return redirect()->route('enrollments.index')->with('flash_message', 'Enrollment Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $enrollment = Enrollment::with(['student', 'course'])->findOrFail($id);
        return view('enrollments.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $enrollment = Enrollment::findOrFail($id);
        $students = Student::all();
        $courses = Course::all();

        return view('enrollments.edit', compact('enrollment', 'students', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validation rules, including completion_date being optional but after enrollment_date
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',
            'status' => 'required|in:active,completed,dropped',
            'completion_date' => 'nullable|date|after_or_equal:enrollment_date'
        ]);

        // Find and update the enrollment record
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update([
            'student_id' => $validatedData['student_id'],
            'course_id' => $validatedData['course_id'],
            'enrollment_date' => $validatedData['enrollment_date'],
            'status' => $validatedData['status'],
            'completion_date' => $validatedData['completion_date'] ?? $enrollment->enrollment_date // Set completion date if provided or keep enrollment date
        ]);

        // Redirect back to the show page of the updated enrollment, with a success message
        return redirect()->route('enrollments.show', $enrollment->id)->with('flash_message', 'Enrollment Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        // Delete the enrollment record
        Enrollment::destroy($id);

        // Redirect back to enrollments index with a success message
        return redirect('/enrollments')->with('flash_message', 'Enrollment Updated Successfully!');

    }
}
