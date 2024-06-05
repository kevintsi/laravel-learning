<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Posts::all();
    return view('welcome', ["posts" => $posts]);
})->name("home");

Route::get('/blog/{id}/posts', function (string $id) {
    $posts = Posts::all()->where("user_id", "==", $id);
    return view("blog", ["id" => $id, "posts" => $posts]);
})->name("blog");

Route::post('/blog/post', [PostController::class, 'store'])->middleware('auth')->name("post.store");

// Route::get('/testAPI', function () {
//     return response()->json([
//         "response" => "Salut"
//     ], 200);
// });

// Route::get('/testAPIAuth', function (Request $request) {
//     $user = $request->user();
//     if (!$user) {
//         return response()->json([
//             "response" => "Not authenticated"
//         ], 401);
//     } else {
//         return response()->json([
//             "response" => $user
//         ], 200);
//     }
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
