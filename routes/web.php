<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/home', function () {
    $user = Auth::user();

    if ($user->type == 'Admin') {
        return redirect('/admin');
    } else {
        return redirect('/blogs');
    }
})->middleware(['auth']);


// Route::get('/admin', function () {
//     return Inertia::render('Admin');
// })->middleware(['auth', 'admin'])->name('admin');

// Admin
Route::get('/admin', function () {
    return Inertia::render('Admin');
})->name('admin');

Route::get('/users', function () {
    return Inertia::render('Admin/users');
})->name('users');

Route::get('/cms', function () {
    return Inertia::render('Admin/cms');
})->name('cms');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Users
Route::get('/blogs', function () {
    return Inertia::render('Blogs'); // Make sure Blogs.vue is inside resources/js/Pages/
})->name('blogs');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/get_all_blogs', BlogController::class);
});

// Route::get('/{any}', function () {
//     return view('app'); // Ensure `app.blade.php` exists
// })->where('any', '.*');
require __DIR__.'/auth.php';
