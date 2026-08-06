<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Application;
use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $newsCount = News::count();
        $applications = Application::latest()->take(5)->get();
        $totalApplications = Application::count();
        $admissionFee = Setting::get('admission_fee', '600');
        $news = News::orderBy('created_at', 'desc')->take(5)->get();

        $sections = ['home', 'school', 'orphanage', 'clinic', 'chapel'];
        $heroImages = [];

        foreach ($sections as $section) {
            $settingPath = Setting::get('hero_' . $section);
            if ($settingPath && file_exists(public_path($settingPath))) {
                $heroImages[$section] = $settingPath;
            } else {
                $heroImages[$section] = null;
            }
        }

        return view('admin.dashboard', compact(
            'newsCount',
            'applications',
            'totalApplications',
            'admissionFee',
            'news',
            'heroImages'
        ));
    }
}
