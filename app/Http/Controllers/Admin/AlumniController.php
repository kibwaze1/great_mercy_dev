<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::orderBy('graduation_year', 'desc')->get();
        return view('admin.alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'graduation_year' => 'required|integer|min:1900|max:' . date('Y'),
            'bio' => 'nullable|string',
            'achievements' => 'nullable|string',
            'current_occupation' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('alumni', 'public');
            $data['image'] = $path;
        }

        Alumni::create($data);

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Alumni added successfully.');
    }

    public function edit(Alumni $alumni)
    {
        return view('admin.alumni.edit', compact('alumni'));
    }

    public function update(Request $request, Alumni $alumni)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'graduation_year' => 'required|integer|min:1900|max:' . date('Y'),
            'bio' => 'nullable|string',
            'achievements' => 'nullable|string',
            'current_occupation' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($alumni->image) {
                \Storage::disk('public')->delete($alumni->image);
            }
            $path = $request->file('image')->store('alumni', 'public');
            $data['image'] = $path;
        }

        $alumni->update($data);

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Alumni updated successfully.');
    }

    public function destroy(Alumni $alumni)
    {
        if ($alumni->image) {
            \Storage::disk('public')->delete($alumni->image);
        }
        $alumni->delete();

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Alumni deleted successfully.');
    }
}
