<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LoginApiController;
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


//Nafiz Subadmin
Route::get('/movie',[ApiController::class,'ManageMovies']);//->middleware('AuthSubAdmin');
Route::post('/movie/upload',[ApiController::class,'uploads']);//->middleware('AuthSubAdmin');
Route::get('/movie/list',[ApiController::class,'movieList']);//->middleware('AuthSubAdmin');
Route::get('/movie/details/{id}',[ApiController::class,'movieDetails']);//->middleware('AuthSubAdmin');
Route::post('/movie/update/{id}',[ApiController::class,'UpdateMovie']);//->middleware('AuthSubAdmin');
Route::get('/movie/delete/{id}',[ApiController::class,'DeleteMovie']);//->middleware('AuthSubAdmin');
Route::get('/subadmin/bills',[ApiController::class,'BillingDetails']);//->middleware('AuthSubAdmin');


//Nafiz Login

Route::post('/login',[LoginApiController::class,'login']);