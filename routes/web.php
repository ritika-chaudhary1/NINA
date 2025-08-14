<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogDetailController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceDetailController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\Frontend\BlogDetailController as FrontendBlogDetailController;
use App\Http\Controllers\PortfolioCategoryController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioDetailController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AdminServiceCategoryController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/




// Home
Route::get('/', [HomeController::class, 'home'])->name('home');

// Services page
Route::get('/service-all', function () {
    $services = \App\Models\Service::with('serviceCategories')->get();
    return view('service_all.index', compact('services'));
})->name('service_all.index');

// Service Details page (frontend)
Route::get('/service-details/{service_id}', function ($service_id) {
    $service = \App\Models\Service::with('serviceCategories')->findOrFail($service_id);
    $serviceDetails = \App\Models\ServiceDetail::where('service_id', $service_id)->orderBy('order')->get();
    return view('service_details.index', compact('service', 'serviceDetails'));
})->name('service_details.show');

// Portfolio page
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');

// Clients and Pricing pages
Route::view('/clients', 'clients')->name('clients');
Route::view('/pricing', 'pricing')->name('pricing');

// Blogs
Route::get('/blog', [FrontendBlogDetailController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{id}', [FrontendBlogDetailController::class, 'show'])->name('blogs.show');

// Contact page
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact-submit', [ContactUsController::class, 'store'])->name('contact.submit');


/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
*/

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

Route::post('admin/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('admin.logout');

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');


/*
|--------------------------------------------------------------------------
| Admin Routes (with auth + admin middleware)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    // Dashboard & Profile
    Route::get('dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
    Route::get('profile', function () { $admin = Auth::user(); return view('admin.profile', compact('admin')); })->name('profile');
    Route::post('profile', [AdminProfileController::class, 'update'])->name('profile.update');

    // Blogs
    Route::resource('blogs', BlogController::class);
    Route::resource('blogs_details', BlogDetailController::class);
    Route::resource('blog_categories', BlogCategoryController::class);

    // Services
    // Route::get('/get-categories/{service_id}', [ServiceController::class, 'getCategories']); 

    Route::resource('services', ServiceController::class);
    Route::resource('service_details', ServiceDetailController::class);
    Route::resource('service-categories', AdminServiceCategoryController::class);

    // Categories
    Route::resource('categories', AdminCategoryController::class);

    // Portfolio
    Route::resource('portfolio_categories', PortfolioCategoryController::class);
    Route::resource('portfolio', PortfolioController::class);
    Route::resource('portfolio_details', PortfolioDetailController::class);

    // Contact
    Route::resource('contact_us', ContactUsController::class);

});
