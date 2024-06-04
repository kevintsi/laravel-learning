<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testAPI', function () {
    return response()->json([
        "response" => "Salut"
    ], 200);
});

Route::get('/testAPIAuth', function (Request $request) {
    $user = $request->user();
    if (!$user) {
        return response()->json([
            "response" => "Not authenticated"
        ], 401);
    } else {
        return response()->json([
            "response" => $user
        ], 200);
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
