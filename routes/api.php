<?php

use App\Http\Controllers\API\ApiProgramController;
use App\Http\Controllers\API\ApiStudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('program', ApiProgramController::class);
Route::post('/program/{id}', [ApiProgramController::class, 'update']);

Route::resource('student', ApiStudentController::class);
Route::post('/student/{id}', [ApiStudentController::class, 'update']);
