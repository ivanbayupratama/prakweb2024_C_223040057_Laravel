<?php

use App\Models\Blogs;
use App\Models\Comments;
use App\Models\Timeline;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\LoginController;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\DashboardBlogsController;
use App\Http\Controllers\DashboardTimelineController;

// MAIN
Route::get('/', function () {
    $title = "Hi! I'm Bhadrika";
    $data = [
        'title' => $title,
        "SEOData" => new SEOData(
            title: $title,
            description: "Hey there! I'm Bhadrika Aryaputra Hermawan, currently cruising through my undergraduate journey in computer science at Pasundan University in Bandung. My passion lies in the world of backend development, where I love crafting the digital magic that powers websites and applications."
        ),
    ];
    return view('main.profile', $data);
});

// BLOGS
Route::get('/blogs', [BlogsController::class, 'index']);
Route::get('/blogs/{blogs:slug}', [BlogsController::class, 'detail']);

// COMMENT BLOG
Route::post('/blogs/{blog:slug}/comment/{comment}', [BlogsController::class, 'replyComment'])->middleware('auth');
Route::post('/blogs/{blog:slug}/comment', [BlogsController::class, 'insertComment'])->middleware('auth');
Route::delete('/blogs/{blog:slug}/comment/{comment}', [BlogsController::class, 'deleteComment'])->middleware('auth');

// TIMELINE
Route::get('/timeline', [TimelineController::class, 'index']);
Route::get('/timeline/{timeline:slug}', [TimelineController::class, 'detail']);

// COMMENT TIMELINE
Route::post('/timeline/{timeline:slug}/comment/{comment}', [TimelineController::class, 'replyComment'])->middleware('auth');
Route::post('/timeline/{timeline:slug}/comment', [TimelineController::class, 'insertComment'])->middleware('auth');
Route::delete('/timeline/{timeline:slug}/comment/{comment}', [TimelineController::class, 'deleteComment'])->middleware('auth');

// OAUTH
Route::get('/signin', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/oauth/callback/{token}', [LoginController::class, 'callback'])->middleware('guest');
Route::get('/oauth/callback', function () {
    return redirect('/signin');
})->middleware('guest');

// Route::post('/signin', [LoginController::class, 'authenticate'])->middleware('guest');
// Route::get('/signup', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/signup', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/signout', [LoginController::class, 'logout'])->middleware('auth');

// DASHBOARD
Route::get('/dashboard', function () {
    $title = "Dashboard";
    $data = [
        'title' => $title,
        "SEOData" => new SEOData(
            title: $title,
            description: "Manage your content on Bhadrika's web."
        ),
    ];
    return view('dashboard.index', $data);
})->middleware('auth');

// DASHBOARD BLOGS
Route::resource('/dashboard/blogs', DashboardBlogsController::class)->parameters([
    'blogs' => 'blogs:slug'
])->middleware(['auth', AdminAuth::class]);

// DASHBOARD TIMELINE
Route::resource('/dashboard/timeline', DashboardTimelineController::class)->parameters([
    'timeline' => 'timeline:slug'
])->middleware(['auth', AdminAuth::class]);
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
// API
Route::get('/dashboard/blogs/checkSlug', [DashboardBlogsController::class, 'checkSlug'])->middleware(['auth', AdminAuth::class]);
