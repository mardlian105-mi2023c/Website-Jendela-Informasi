<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user', 'news')->latest()->paginate(10);
        return response()->json($comments);
    }
    
    public function store(Request $request, News $news)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::id();
        $comment->news_id = $news->id;
        $comment->parent_id = $request->parent_id;
        $comment->save();

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Komentar berhasil ditambahkan',
                'comment' => $comment->load('user'),
            ], 201);
        }

        return back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function destroy(Request $request, Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Komentar berhasil dihapus',
            ]);
        }

        return back()->with('success', 'Komentar berhasil dihapus');
    }
}