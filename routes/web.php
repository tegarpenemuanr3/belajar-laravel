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
| https://laravel.com/docs/8.x/routing
*/

Route::get('/', function () {
    return view('welcome');
});

//Route langsung tampilkan konten
Route::get('/greeting', function () {
    return 'Hello World';
});

//Redirect URL routing
Route::redirect('/coba', '/greeting', 301);

//Route dengan parameter bebas (angka/string)
Route::get('/user/{id}', function ($id) {
    return 'User ' . $id;
});

//Optional Route parameter, pemberian nilai default ketika kosong 
Route::get('/users/{name?}', function ($name = 'John') {
    return $name;
});

//Named route
Route::get('/coba/profile', function () {
    return 'Hello Guys';
})->name('profile');

//Route Prefix
Route::prefix('admin')->group(function () {
    Route::get('/coba', function () {
        // Matches The "/admin/coba" URL
        return 'Hello Semua';
    });
});

//show template
// Route::get('home', function () {
//     return view('main');
// });

Route::get('home', function () {
    return view('home');
});
