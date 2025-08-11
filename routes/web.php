<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProfileController;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [HomeController::class, 'home'])->name('home');

// Blogs listing route
// Route::get('/blogs', function () {
//     return view('blogs.index'); 
// })->name('blogs.index');

// Blogs detail route (if you have one)
// Route::get('/blogs-details', function () {
//     return view('blogs-details.index'); 
// })->name('blogs.details');

//for admin
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');   // Redirect to home page
})->name('admin.logout');
Route::get('/login', function () {
    return redirect()->route('admin.login'); // redirect to your admin login page
})->name('login');

Route::get('admin/dashboard', function () {
    return view('admin.dashboard'); // create this view or return a simple message for now
})->name('admin.dashboard')->middleware('auth');

Route::get('admin/profile', function () {
    $admin = Auth::user();
    return view('admin.profile', compact('admin'));
})->name('admin.profile')->middleware('auth');


Route::post('admin/profile', [AdminProfileController::class, 'update'])
    ->name('admin.profile.update')
    ->middleware('auth');

//for blogs
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('blogs', BlogController::class);
});
//for service section

// Admin routes for services (no show, because frontend handles it)
Route::resource('services', ServiceController::class)->except(['show']);

// Admin routes for service details CRUD
Route::resource('service-details', ServiceDetailController::class);

// Frontend route to display a single service with its details
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
