<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniPublicController extends Controller
{
    public function index()
    {
        $alumni = Alumni::where('is_active', true)
                    ->orderBy('graduation_year', 'desc')
                    ->get();
        return view('alumni.index', compact('alumni'));
    }

    public function show(Alumni $alumni)
    {
        return view('alumni.show', compact('alumni'));
    }
}
