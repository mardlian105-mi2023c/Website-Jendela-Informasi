<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $selectedUser = $request->query('user');
        $messages = [];

        if ($selectedUser) {
            $messages = Message::where(function ($query) use ($selectedUser) {
                    $query->where('sender_id', Auth::id())
                          ->where('receiver_id', $selectedUser);
                })->orWhere(function ($query) use ($selectedUser) {
                    $query->where('sender_id', $selectedUser)
                          ->where('receiver_id', Auth::id());
                })->orderBy('created_at')->get();
        }

        return view('chat.index', compact('users', 'messages', 'selectedUser'));
    }

    public function apipesan(Request $request)
    {
        $authUserId = Auth::id();
        $selectedUserId = $request->query('user');

        $users = User::where('id', '!=', $authUserId)->get();

        $selectedUser = null;
        $messages = [];

        if ($selectedUserId) {
            $selectedUser = User::find($selectedUserId);

            if (!$selectedUser) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User tidak ditemukan.',
                ], 404);
            }

            // Pesan antara user login dan selected user
            $messages = Message::with(['sender', 'receiver'])
                ->where(function ($query) use ($authUserId, $selectedUserId) {
                    $query->where('sender_id', $authUserId)
                          ->where('receiver_id', $selectedUserId);
                })
                ->orWhere(function ($query) use ($authUserId, $selectedUserId) {
                    $query->where('sender_id', $selectedUserId)
                          ->where('receiver_id', $authUserId);
                })
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            // Ambil semua pesan jika tidak ada user yang dipilih
            $messages = Message::with(['sender', 'receiver'])
                ->orderBy('created_at', 'asc')
                ->get();
        }

        return response()->json([
            'messages' => $messages,
        ]);
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'User belum login atau token tidak valid.',
            ], 401);
        }
    
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);
    
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Pesan berhasil dikirim.',
            'data' => $message,
        ], 201);    

        return redirect()->route('chat.index', ['user' => $request->receiver_id]);
    }
}