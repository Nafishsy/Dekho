<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LoginApiController;
use App\Http\Controllers\APIAdminController;
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

//Nafiz Login

Route::post('/login',[LoginApiController::class,'login']);
Route::post('/logout',[LoginApiController::class,'Logout']);
Route::post('/registration',[LoginApiController::class,'registration']);
Route::post('/forgetpass',[LoginApiController::class,'forgetpass']);
Route::post('/otp',[LoginApiController::class,'OTP']);

Route::post('/userinfo',[LoginApiController::class,'UserInfo']);

//Nafiz Subadmin
Route::get('/movie',[ApiController::class,'ManageMovies'])->middleware('AuthSubAdmin');
Route::post('/movie/upload',[ApiController::class,'uploads'])->middleware('AuthSubAdmin');
Route::get('/movie/list',[ApiController::class,'movieList'])->middleware('AuthSubAdmin');
Route::get('/movie/details/{id}',[ApiController::class,'movieDetails'])->middleware('AuthSubAdmin');
Route::post('/movie/update/{id}',[ApiController::class,'UpdateMovie'])->middleware('AuthSubAdmin');
Route::get('/movie/delete/{id}',[ApiController::class,'DeleteMovie'])->middleware('AuthSubAdmin');
Route::get('/subadmin/bills',[ApiController::class,'BillingDetails'])->middleware('AuthSubAdmin');






//Anik Admin

Route::get('/Admin/Home',[APIAdminController::class,'adminHome']);

Route::get('/Admin/CustomersMoviesList',[APIAdminController::class,'adminCheckCustomersMovies']);
Route::get('/Admin/CustomersMoviesList/{id}/details',[APIAdminController::class,'adminUserMovieInfo']);

Route::get('/Admin/UsersList',[APIAdminController::class,'adminUsersList']);
Route::get('/Admin/UsersList/{id}/details',[APIAdminController::class,'adminChangeRole']);
Route::get('/Admin/UserInfo/{id}/details',[APIAdminController::class,'adminUserInfo']);
Route::post('Admin/UsersList/search',[APIAdminController::class,'adminSearchUsersSubmit']);
Route::post('Admin/CustomerMovie/search',[APIAdminController::class,'adminCustomerMovieSubmit']);
Route::post('profilepic/upload',[APIAdminController::class,'ProfilePicUp']);
Route::post('profilepic/changepass',[APIAdminController::class,'ChangePassword']);

//