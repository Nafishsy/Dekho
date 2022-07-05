<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubAdminController;

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

Route::get('/',[SubAdminController::class,'ManageMovies'])->name('SubAdmin.movieManage');
Route::get('/subadmin/addmovies',[SubAdminController::class,'AddMovies'])->name('SubAdmin.AddMovies');
Route::post('/subadmin/addmovies',[SubAdminController::class,'UploadMovie'])->name('SubAdmin.AddMovies.Upload');

