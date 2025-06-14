<?php

use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
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

//-----------------------------------------Posts-------------------------------------------
// Routes publiques
Route::get('news', [PostController::class, 'index']);
Route::get('news/{post}', [PostController::class, 'show']);

// Routes protégées
Route::middleware('auth:sanctum')->group(function () {
    Route::post('news/create', [PostController::class, 'store']);
    Route::put('news/{post}/update', [PostController::class, 'update']);
    Route::delete('news/{post}/delete', [PostController::class, 'destroy']);
});

//-----------------------------------------Teams-------------------------------------------
// Routes publiques
Route::get('/team/{team_id}', [TeamController::class, 'index']);

// Routes protégées
Route::middleware('auth:sanctum')->group(function () {
    
});


//-----------------------------------------Partners-------------------------------------------
// Routes publiques
Route::get('/partners', [PartnerController::class, 'index']);
Route::get('partner/{post}', [PartnerController::class, 'show']);

// Routes protégées
Route::middleware('auth:sanctum')->group(function () {
    Route::post('partner/create', [PartnerController::class, 'store']);
    Route::put('partner/{post}/update', [PartnerController::class, 'update']);
    Route::delete('partner/{post}/delete', [PartnerController::class, 'destroy']);
});