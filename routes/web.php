<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\{
    HomeController,
    AdminAuthController,
    AdminProfileController,
    BlogController,
    BlogDetailController,
    BlogCategoryController,
    ServiceController,
    ServiceDetailController,
    AdminServiceCategoryController,
    PortfolioController,
    PortfolioCategoryController,
    PortfolioDetailController,
    ContactUsController,
    ClientController
};

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

// Services page
Route::get('/service', [ServiceController::class, 'frontendIndex'])->name('service.index');

Route::get('/contacts_us', function () {
    return view('contacts_us.index');
})->name('contacts_us.index');

//HomeController Routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/blog', [HomeController::class, 'blogList'])->name('blog.index');
Route::get('/blog_detail/{id?}', [HomeController::class, 'blogDetail'])->name('blog_detail.index');
Route::get('/portfolios', [HomeController::class, 'portfolioList'])->name('portfolios.index');
Route::get('/portfolio_detail/{portfolio_detail}', [HomeController::class, 'portfolioDetail'])->name('portfolio_detail.index');
Route::get('/service_detail/{service}', [HomeController::class, 'serviceDetail'])->name('service_detail.index');


Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact_us.store');

// Portfolio page
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');

// Static Pages
Route::view('/pricing', 'pricing')->name('pricing');

// Blogs
// Route::get('/blog_detail/{id}', [FrontendBlogDetailController::class, 'show'])->name('blog_detail.show');

// Contact page
Route::view('/contact', 'contact')->name('contact');
Route::get('/contacts_us', function () { return view('contacts_us.index'); })->name('contacts_us.index');

// Document root test route
Route::get('/check-public', function () {
    return 'Laravel is serving from public/index.php';
});

// Contact form submission
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact_us.store');
Route::post('/contact-submit', [ContactUsController::class, 'store'])->name('contact.submit');

// Blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog_detail.show');


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

Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');


/*
|--------------------------------------------------------------------------
| Admin Routes (auth + admin middleware)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    // Dashboard & Profile
    Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('profile', fn() => view('admin.profile', ['admin' => Auth::user()]))->name('profile');
    Route::post('profile', [AdminProfileController::class, 'update'])->name('profile.update');


    // Blog Categories
    Route::resource('blog_categories', BlogCategoryController::class);

    // Blogs
    Route::resource('blogs', BlogController::class);
    Route::resource('blogs_details', BlogDetailController::class);

    // Services & Categories
    Route::resource('services', ServiceController::class);
    Route::resource('service_details', ServiceDetailController::class);
    Route::resource('service-categories', AdminServiceCategoryController::class);

    // Portfolio
    Route::resource('portfolio_categories', PortfolioCategoryController::class);
    Route::resource('portfolio_details', PortfolioDetailController::class);

    // Clients
    Route::resource('clients', ClientController::class);

    // Contact
    Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact_us.index');
    Route::get('contact-us/create', [ContactUsController::class, 'create'])->name('contact_us.create');
    Route::get('contact-us/{contactUs}', [ContactUsController::class, 'show'])->name('contact_us.show');
    Route::post('contact-us', [ContactUsController::class, 'store'])->name('contact_us.store');
    Route::delete('/contact-us/{contactUs}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy'); 
});
