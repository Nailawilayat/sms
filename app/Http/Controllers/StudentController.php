<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    // Display all students
    public function index(): View
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show form to add a student
    public function create(): View
    {
        return view('students.create');
    }

    // Store a new student
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        Student::create($validated);
        return redirect()->route('students.index')->with('flash_message', 'Student Added!');
    }

    // Display single student
    public function show(string $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    // Show form to edit a student
    public function edit(string $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Update a student's details
    public function update(Request $request, string $id): RedirectResponse
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $student->update($validated);
        return redirect()->route('students.index')->with('flash_message', 'Student Updated!');
    }

    // Delete a student
    public function destroy(string $id): RedirectResponse
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('flash_message', 'Student Deleted!');
    }
    
}
