<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EdulevelController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;

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
    // return view('welcome');
    return view('home');
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

// route call controller
Route::get('edulevels', [EdulevelController::class, 'data']);
Route::get('edulevels/add', [EdulevelController::class, 'add']);
Route::post('edulevels', [EdulevelController::class, 'addProcess']);
Route::get('edulevels/edit/{id}', [EdulevelController::class, 'edit']);
Route::patch('edulevels/{id}', [EdulevelController::class, 'editProcess']);
Route::delete('edulevels/{id}', [EdulevelController::class, 'delete']);

Route::get('programs/trash', [ProgramController::class, 'trash']);
Route::get('programs/restore/{id?}', [ProgramController::class, 'restore']);
Route::get('programs/delete/{id?}', [ProgramController::class, 'delete']);
Route::resource('programs', ProgramController::class);

//Student - Image CRUD
Route::get('students', [StudentController::class, 'index']);
Route::get('add-student', [StudentController::class, 'create']);
Route::post('add-student', [StudentController::class, 'store']);
Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::get('delete-student/{id}', [StudentController::class, 'destroy']);
Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);
