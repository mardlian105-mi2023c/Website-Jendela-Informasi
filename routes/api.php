<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ChatController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/chat', [ChatController::class, 'apipesan']);
    Route::post('/chat', [ChatController::class, 'store']);
});

Route::get('/comments', [CommentController::class, 'index']);

Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class, 'register']);

Route::get('/news', [NewsController::class, 'apiIndex']);
Route::put('/news/{news}', [NewsController::class, 'update']);
Route::delete('/news/{news}', [NewsController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'user' => $request->user()
    ]);
});

Route::post('/admin/news', [NewsController::class, 'store']);