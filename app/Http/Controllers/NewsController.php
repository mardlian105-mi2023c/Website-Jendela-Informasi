<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->latest()->get();
        return view('admin.news.index', compact('news'));
    }

    public function berita()
    {
        $news = News::latest()->paginate(9);
        return view('berita', compact('news'));
    }

    public function kategori($id)
    {
        $category = Category::findOrFail($id);
        $news = $category->news()->latest()->paginate(9);
        return view('news.index', compact('news'));
    }

    public function userIndex()
    {
        $news = News::with('category')->latest()->paginate(9); 
        return view('news.index', compact('news'));
    }

    public function apiIndex()
    {
        $news = News::with('category')->latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $news
        ], 200);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news_images', 'public');
        }

        $validated['user_id'] = Auth::id() ?? 1;

        $news = News::create($validated);

        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berita berhasil ditambahkan!',
                'data' => $news->load('category')
            ], 201);
        }

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news_images', 'public');
        }

        $news->update($validated);

        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berita berhasil diupdate!',
                'data' => $news->load('category')
            ], 201);
        }
        
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Request $request, News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berita berhasil dihapus!'
        ], 200);
    }

    public function show(Request $request, News $news)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => $news->load('category')
            ]);
        }

        return view('news.show', compact('news'));
    }
}