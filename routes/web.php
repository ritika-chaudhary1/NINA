<?php

use Illuminate\Support\Facades\Route;

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
