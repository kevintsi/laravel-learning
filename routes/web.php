<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Posts;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Posts::orderByDesc("updated_at")->get();
    return view('welcome', ["posts" => $posts]);
})->name("home");

Route::get('/blog/{id}/posts', function (string $id) {
    $posts = Posts::all()->where("user_id", "==", $id)->sortByDesc("updated_at");
    return view("blog", ["id" => $id, "posts" => $posts]);
})->name("blog");

Route::middleware("auth")->group(function () {
    Route::post('/blog/post', [PostController::class, 'store'])->name("post.store");
    Route::get('/blog/post/{id}', [PostController::class, 'update_page'])->name("post.update.page");
    Route::put('/blog/post/{posts}', [PostController::class, 'update'])->name("post.update");
    Route::delete('/blog/post/{posts}', [PostController::class, 'destroy'])->name("post.delete");
});
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
