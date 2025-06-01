<?php

use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login-test', function () {
    $user = User::first(); // Prend le premier utilisateur
    return ['token' => $user->createToken('test-token')->plainTextToken];
});

// Post
// Routes publiques
Route::get('actualités', [PostController::class, 'index']);
Route::get('actualité/{post}', [PostController::class, 'show']);

// Routes protégées
Route::middleware('auth:sanctum')->group(function () {
    Route::post('actualité', [PostController::class, 'store']);
    Route::put('actualité/{post}', [PostController::class, 'update']);
    Route::delete('actualité/{post}', [PostController::class, 'destroy']);
});
