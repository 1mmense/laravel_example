<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
Route::view('/', 'home');

Route::get('/blog', function () {
    $posts = Post::with(['comments', 'tags'])->paginate(4);

    return view('posts.index', [
        'posts' => $posts
    ]);
});

// Route::get('blog/{post:some_column}');
Route::get('/blog/{id}', function ($id) {
    $post = Post::find($id);

    return view('posts.show', [
        'post' => $post
    ]);
});

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{job}', 'show');

    // 'job' in 'can:edit-job,job' refers to {job} wildcard
    // Route::get('/jobs/{job}/edit', 'edit')
    //     ->middleware(['auth', 'can:edit-job,job']);

    // Route::get('/jobs/{job}/edit', 'edit')
    //     ->middleware('auth')
    //     ->can('edit-job', 'job'); // 'edit-job' is a Gate

    Route::get('/jobs/{job}/edit', 'edit')
        ->middleware('auth')
        ->can('edit', 'job'); // 'edit' is a JobPolicy

    Route::patch('/jobs/{job}', 'update')
        ->middleware('auth')
        ->can('edit', 'job');

    Route::delete('/jobs/{job}', 'destroy')
        ->middleware('auth')
        ->can('edit', 'job');

    Route::post('/jobs', 'store')
        ->middleware('auth')
        ->can('edit', 'job');
});

// Route::resource('jobs', JobController::class, [
//     // 'only'   => ['index', 'show', 'create', 'store'],
//     // 'except' => ['edit'],
// ]);

// Route::resource('jobs', JobController::class)->only(['index', 'show']);
// Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');

Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'create');
    Route::post('/register', 'store');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('login', 'create')->name('login');
    Route::post('login', 'store');
    Route::post('logout', 'destroy');
});
