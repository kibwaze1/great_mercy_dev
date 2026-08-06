<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentHighlight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentHighlightController extends Controller
{
    public function index()
    {
        $highlights = StudentHighlight::orderBy('created_at', 'desc')->get();
        return view('admin.students.index', compact('highlights'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'class' => 'nullable|string|max:100',
            'achievement' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('students', 'public');
            $data['image'] = $path;
        }

        StudentHighlight::create($data);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student highlight added successfully.');
    }

    public function edit(StudentHighlight $highlight)
    {
        return view('admin.students.edit', compact('highlight'));
    }

    public function update(Request $request, StudentHighlight $highlight)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'class' => 'nullable|string|max:100',
            'achievement' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($highlight->image) {
                Storage::disk('public')->delete($highlight->image);
            }
            $path = $request->file('image')->store('students', 'public');
            $data['image'] = $path;
        }

        $highlight->update($data);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student highlight updated successfully.');
    }

    public function destroy(StudentHighlight $highlight)
    {
        if ($highlight->image) {
            Storage::disk('public')->delete($highlight->image);
        }
        $highlight->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student highlight deleted successfully.');
    }
}
