<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolPageController extends Controller
{
    public function home()
    {
        // Get hero image from settings
        $heroImage = Setting::get('hero_school');
        $heroUrl = null;

        if ($heroImage) {
            if (file_exists(public_path($heroImage))) {
                $heroUrl = asset($heroImage);
            } elseif (file_exists(public_path('images/' . basename($heroImage)))) {
                $heroUrl = asset('images/' . basename($heroImage));
            } elseif (Storage::disk('public')->exists($heroImage)) {
                $heroUrl = asset('storage/' . $heroImage);
            }
        }

        // Default fallback if no image found
        if (!$heroUrl) {
            $heroUrl = asset('images/hero_school.jpg');
        }

        return view('school.home', compact('heroUrl'));
    }

    public function academics()
    {
        return view('school.academics');
    }

    public function admission()
    {
        $admissionFee = Setting::get('admission_fee', 600);
        return view('school.admission', compact('admissionFee'));
    }

    public function about()
    {
        return view('school.about');
    }

    public function contact()
    {
        return view('school.contact');
    }
}
