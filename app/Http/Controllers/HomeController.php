<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get active news for the home page
        $news = News::where('is_active', true)
                    ->orderBy('created_at', 'desc')
                    ->take(6)
                    ->get();

        // Get hero image from settings
        $heroImage = Setting::get('hero_home');
        $heroUrl = asset('hero.jpeg'); // default fallback

        if ($heroImage) {
            // Check if file exists in public folder
            if (file_exists(public_path($heroImage))) {
                $heroUrl = asset($heroImage);
            }
            // Check if file exists in public/images folder
            elseif (file_exists(public_path('images/' . basename($heroImage)))) {
                $heroUrl = asset('images/' . basename($heroImage));
            }
            // Check if file exists with just the filename
            elseif (file_exists(public_path(basename($heroImage)))) {
                $heroUrl = asset(basename($heroImage));
            }
        }

        return view('home', compact('news', 'heroUrl'));
    }
}
