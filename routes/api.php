<?php

use App\Http\Controllers\NewsController;
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

Route::middleware('auth:sanctum')->get('/dashboard', function () {
    return ['message' => 'Bienvenue sur ton dashboard API, DevBuddy !'];
});



// News
Route::get('news', [NewsController::class, 'index']);
Route::get('news/{id}', [NewsController::class, 'show']);
Route::post('news', [NewsController::class, 'store']);
Route::put('news/{id}', [NewsController::class, 'update']);
Route::delete('news/{id}', [NewsController::class, 'destroy']);

