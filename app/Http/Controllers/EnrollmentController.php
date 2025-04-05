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
    public function index(): View
    {
        $enrollments = Enrollment::with(['student', 'course'])->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create(): View
    {
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.create', compact('students', 'courses'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',
            'status' => 'required|in:Active,Completed,Dropped',
            'completion_date' => 'nullable|date|after_or_equal:enrollment_date'
        ]);

        Enrollment::create($validatedData);

        return redirect()->route('enrollments.index')->with('flash_message', 'Enrollment added successfully!');
    }

    public function show(string $id): View
    {
        $enrollment = Enrollment::with(['student', 'course'])->findOrFail($id);
        return view('enrollments.show', compact('enrollment'));
    }

    public function edit(string $id): View
    {
        $enrollment = Enrollment::findOrFail($id);
        $students = Student::all();
        $courses = Course::all();

        return view('enrollments.edit', compact('enrollment', 'students', 'courses'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',
            'status' => 'required|in:Active,Completed,Dropped',
            'completion_date' => 'nullable|date|after_or_equal:enrollment_date'
        ]);

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($validatedData);

        return redirect()->route('enrollments.index')->with('flash_message', 'Enrollment updated successfully!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Enrollment::destroy($id);
        return redirect()->route('enrollments.index')->with('flash_message', 'Enrollment deleted successfully!');
    }
}
