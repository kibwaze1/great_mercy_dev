<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'is_active']);

        if ($request->hasFile('image')) {
            // Ensure directory exists
            if (!file_exists(public_path('images/news'))) {
                mkdir(public_path('images/news'), 0755, true);
            }

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = 'images/news/' . $fileName;
            $request->file('image')->move(public_path('images/news'), $fileName);
            $data['image'] = $path;
        }

        News::create($data);
        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'is_active']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image && file_exists(public_path($news->image))) {
                unlink(public_path($news->image));
            }

            if (!file_exists(public_path('images/news'))) {
                mkdir(public_path('images/news'), 0755, true);
            }

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = 'images/news/' . $fileName;
            $request->file('image')->move(public_path('images/news'), $fileName);
            $data['image'] = $path;
        }

        $news->update($data);
        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        if ($news->image && file_exists(public_path($news->image))) {
            unlink(public_path($news->image));
        }
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }
}
