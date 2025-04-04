<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\View\View;

class TeacherController extends Controller
{
    public function index(): View
    {
        $teachers = Teacher::all();
        return view('teachers.index')->with('teachers', $teachers);
    }

    public function create(): View
    {
        return view('teachers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'nullable|string|max:15',
        ]);

        $input = $request->all();
        Teacher::create($input);

        return redirect('teachers')->with('flash_message', 'Teacher Added!');
    }

    public function show(string $id): View
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return redirect('teachers')->with('error_message', 'Teacher not found!');
        }
        return view('teachers.show')->with('teacher', $teacher);
    }

    public function edit(string $id): View
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return redirect('teachers')->with('error_message', 'Teacher not found!');
        }
        return view('teachers.edit')->with('teacher', $teacher);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $id,
            'phone' => 'nullable|string|max:15',
        ]);

        $teacher = Teacher::find($id);
        if ($teacher) {
            $teacher->update($request->all());
            return redirect('teachers')->with('flash_message', 'Teacher Updated!');
        }

        return redirect('teachers')->with('error_message', 'Teacher not found!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return redirect('teachers')->with('error_message', 'Teacher not found!');
        }
        Teacher::destroy($id);
        return redirect('teachers')->with('flash_message', 'Teacher Deleted!');
    }
}
