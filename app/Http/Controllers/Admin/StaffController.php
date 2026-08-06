<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::orderBy('category')->orderBy('position')->get();
        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'category' => 'required|in:Director,Teaching,Non-Teaching',
            'bio' => 'nullable|string',
            'qualification' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('staff', 'public');
            $data['image'] = $path;
        }

        Staff::create($data);

        return redirect()->route('admin.staff.index')
            ->with('success', 'Staff added successfully.');
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'category' => 'required|in:Director,Teaching,Non-Teaching',
            'bio' => 'nullable|string',
            'qualification' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($staff->image) {
                \Storage::disk('public')->delete($staff->image);
            }
            $path = $request->file('image')->store('staff', 'public');
            $data['image'] = $path;
        }

        $staff->update($data);

        return redirect()->route('admin.staff.index')
            ->with('success', 'Staff updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        if ($staff->image) {
            \Storage::disk('public')->delete($staff->image);
        }
        $staff->delete();

        return redirect()->route('admin.staff.index')
            ->with('success', 'Staff deleted successfully.');
    }
}
