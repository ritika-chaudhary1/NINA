<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


use App\Http\Controllers\AdminAuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

// Blogs listing route
Route::get('/blogs', function () {
    return view('blogs.index'); // or your blogs listing view
})->name('blogs.index');

// Blogs detail route (if you have one)
Route::get('/blogs-details', function () {
    return view('blogs-details.index'); // your blog detail view
})->name('blogs.details');

//for admin
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('admin.login');
})->name('admin.logout');
Route::get('admin/dashboard', function () {
    return view('admin.dashboard'); // create this view or return a simple message for now
})->name('admin.dashboard')->middleware('auth');
