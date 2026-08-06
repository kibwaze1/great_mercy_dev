<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function applications(Request $request)
    {
        $query = Application::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('full_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
        }

        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // Filter by payment status
        if ($request->has('payment') && $request->payment != 'all') {
            $query->where('payment_status', $request->payment);
        }

        $applications = $query->latest()->paginate(15);

        // Get counts for stats
        $totalPending = Application::where('status', 'pending')->count();
        $totalApproved = Application::where('status', 'approved')->count();
        $totalPaid = Application::where('payment_status', 'paid')->count();

        return view('admin.applications', compact('applications', 'totalPending', 'totalApproved', 'totalPaid'));
    }

    public function show(Application $application)
    {
        return view('admin.application_detail', compact('application'));
    }

    public function approve(Application $application)
    {
        $application->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Application approved successfully.');
    }

    public function reject(Application $application)
    {
        $application->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Application rejected.');
    }

    public function bulkApprove(Request $request)
    {
        $ids = $request->ids;
        if ($ids) {
            Application::whereIn('id', $ids)->update(['status' => 'approved']);
            return response()->json(['success' => true, 'message' => 'Applications approved successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'No applications selected.']);
    }
}
