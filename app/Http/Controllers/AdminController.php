<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic'); // simple HTTP auth
    }

    public function applications(Request $request)
    {
        $query = Application::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('full_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
        }

        $applications = $query->latest()->paginate(15);

        return view('admin.applications', compact('applications'));
    }

    public function show(Application $application)
    {
        return view('admin.application_detail', compact('application'));
    }
}
