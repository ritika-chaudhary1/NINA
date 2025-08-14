<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogDetailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceDetailController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminServiceCategoryController;
use App\Http\Controllers\Frontend\BlogDetailController as FrontendBlogDetailController;
use App\Http\Controllers\PortfolioCategoryController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioDetailController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\BlogCategoryController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/




// Home
Route::get('/', [HomeController::class, 'home'])->name('home');

// Services page
Route::get('/service-all', function () {
    return view('service_all.index');
})->name('service_all.index');

Route::get('/service-details', function () {
    return view('service_details.index');
})->name('service_details.index');

Route::get('/portfolio', function () {
    return view('portfolio.index');
})->name('portfolio.index');

Route::get('/blogs', function () {
    return view('blogs.index');
})->name('blogs.index');

// Route::get('/blogs.index', [BlogController::class, 'index'])->name('blogs.index');

Route::get('/blogs_details', function () {
    return view('blogs_details.index');
})->name('blogs_details.index');

// Portfolio page
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');

// Clients and Pricing pages
Route::view('/clients', 'clients')->name('clients');
Route::view('/pricing', 'pricing')->name('pricing');

// Blogs
Route::get('/blogs', [FrontendBlogDetailController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{id}', [FrontendBlogDetailController::class, 'show'])->name('blogs.show');

// Contact page
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact-submit', [ContactMessageController::class, 'store'])->name('contact.submit');


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

    //Categories
    Route::resource('blog_categories', BlogCategoryController::class);
    Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('blog_categories',BlogCategoryController::class);
});

    // Blogs
    Route::resource('blogs', BlogController::class);
    Route::resource('blogs_details', BlogDetailController::class);

    // Services
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
    Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact_us.index');
    Route::get('contact-us/create', [ContactUsController::class, 'create'])->name('contact_us.create');
    Route::get('contact-us/{contactUs}', [ContactUsController::class, 'show'])->name('contact_us.show');
    Route::post('contact-us', [ContactUsController::class, 'store'])->name('contact_us.store');
    Route::delete('/contact-us/{contactUs}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy'); 

});
