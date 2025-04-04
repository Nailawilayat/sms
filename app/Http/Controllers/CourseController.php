<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Course;
use App\Models\Teacher;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::with('teacher')->get();
        return view('courses.index', compact('courses'));
    }

    public function create(): View
    {
        $teachers = Teacher::all();
        return view('courses.create', compact('teachers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|string|max:50',
            'description' => 'nullable|string|max:500',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        // Input Sanitization
        $validatedData['name'] = strip_tags($validatedData['name']);
        $validatedData['duration'] = strip_tags($validatedData['duration']);
        $validatedData['description'] = strip_tags($validatedData['description'] ?? '');

        Course::create($validatedData);

        return redirect()->route('courses.index')->with('success', 'Course Added Successfully!');
    }

    public function show(string $id): View
    {
        $course = Course::with('teacher')->findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function edit(string $id): View
    {
        $course = Course::findOrFail($id);
        $teachers = Teacher::all();
        return view('courses.edit', compact('course', 'teachers'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|string|max:50',
            'description' => 'required|string|max:500',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        // Input Sanitization
        $validatedData['name'] = strip_tags($validatedData['name']);
        $validatedData['duration'] = strip_tags($validatedData['duration']);
        $validatedData['description'] = strip_tags($validatedData['description']);

        $course = Course::findOrFail($id);
        $course->update($validatedData);

        return redirect()->route('courses.index')->with('success', 'Course Updated Successfully!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course Deleted Successfully!');
    }
}
