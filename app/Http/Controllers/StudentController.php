<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    // Show all students
    public function index(): View
    {
        $students = Student::all();
        return view('students.index')->with('students', $students);
    }

    // Show form to add a new student
    public function create(): View
    {
        return view('students.create');
    }

    // Store a new student
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Student::create($input);
        return redirect()->route('students.index')->with('flash_message', 'Student Added!');
    }

    // Show a single student
    public function show(string $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.show')->with('student', $student); // 🔥 Fix: Change 'students' → 'student'
    }

    // Show form to edit a student
    public function edit(string $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.edit')->with('student', $student); // 🔥 Fix: Change 'students' → 'student'
    }

    // Update a student's details
    public function update(Request $request, string $id): RedirectResponse
    {
        $student = Student::findOrFail($id); // 🔥 Fix: Use `findOrFail`
        $input = $request->all();
        $student->update($input);
        return redirect()->route('students.index')->with('flash_message', 'Student Updated!');
    }

    // Delete a student
    public function destroy(string $id): RedirectResponse
    {
        Student::findOrFail($id)->delete(); // 🔥 Fix: Ensure student exists before deleting
        return redirect()->route('students.index')->with('flash_message', 'Student Deleted!');
    }
}
