<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Blog;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogDetailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceDetailController;
use App\Http\Controllers\AdminCategoryController;
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

// Services page
Route::get('/service', function () {
    return view('service.index');
})->name('service.index');

Route::get('/service-detail', function () {
    return view('service_detail.index');
})->name('service_detail.index');

// Route::get('/portfolios', function () {
//     return view('portfolios.index');
// })->name('portfolios.index');

Route::get('/portfolio_detail', function () {
    return view('portfolio_detail.index');
})->name('portfolio_detail.index');

// Route::get('/blog', function () {
//     return view('blog.index');
// })->name('blog.index');
Route::get('/blog', [HomeController::class, 'blogList'])->name('blog.index');
Route::get('/blog_detail/{id?}', [HomeController::class, 'blogDetail'])->name('blog_detail.index');

// Route::get('/blog_detail', function () {
//     return view('blog_detail.index');
// })->name('blog_detail.index');

Route::get('/contacts_us', function () {
    return view('contacts_us.index');
})->name('contacts_us.index');

//HomeController Routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/blog', [HomeController::class, 'blogList'])->name('blog.index');
Route::get('/blog_detail/{id?}', [HomeController::class, 'blogDetail'])->name('blog_detail.index');
Route::get('/portfolios', [HomeController::class, 'portfolioList'])->name('portfolios.index');
Route::get('/portfolio_detail', [HomeController::class, 'portfolioDetail'])->name('portfolio_detail.index');

Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact_us.store');

// Portfolio page
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');

// Clients and Pricing pages
// Route::view('/clients', 'clients')->name('clients');
Route::view('/pricing', 'pricing')->name('pricing');

// Blogs
// Route::get('/blog_detail/{id}', [FrontendBlogDetailController::class, 'show'])->name('blog_detail.show');

// Contact page
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact-submit', [ContactMessageController::class, 'store'])->name('contact.submit');

// Blog Detail
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog_detail.show');

Route::get('/blogs', function () {
    $blogs_details = Blog::latest()->get();
    return view('blogs.index', compact('blogs_details'));
})->name('blogs.index');


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

    // Blog Categories
    Route::resource('blog_categories', BlogCategoryController::class);

    // Blogs
    Route::resource('blogs', BlogController::class);
    Route::resource('blogs_details', BlogDetailController::class);

    // Services
    Route::resource('services', ServiceController::class);
    Route::resource('service-details', ServiceDetailController::class);

    // Portfolio
    Route::resource('portfolio_categories', PortfolioCategoryController::class);
    Route::resource('portfolio_details', PortfolioDetailController::class);

    // Clients ✅ define here directly
    Route::resource('clients', ClientController::class);

    // Contact
    Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact_us.index');
    Route::get('contact-us/create', [ContactUsController::class, 'create'])->name('contact_us.create');
    Route::get('contact-us/{contactUs}', [ContactUsController::class, 'show'])->name('contact_us.show');
    Route::post('contact-us', [ContactUsController::class, 'store'])->name('contact_us.store');
    Route::delete('/contact-us/{contactUs}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy'); 
});
