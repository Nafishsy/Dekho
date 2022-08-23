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


Route::post('/forgetpass',[LoginApiController::class,'forgetpass']);
Route::post('/otp',[LoginApiController::class,'OTP']);



//Nafiz Subadmin
Route::get('/movie',[ApiController::class,'ManageMovies'])->middleware('AuthSubAdmin');
Route::post('/movie/upload',[ApiController::class,'uploads'])->middleware('AuthSubAdmin');
Route::get('/movie/list',[ApiController::class,'movieList'])->middleware('AuthSubAdmin');
Route::get('/movie/details/{id}',[ApiController::class,'movieDetails'])->middleware('AuthSubAdmin');
Route::post('/movie/update/{id}',[ApiController::class,'UpdateMovie'])->middleware('AuthSubAdmin');
Route::get('/movie/delete/{id}',[ApiController::class,'DeleteMovie'])->middleware('AuthSubAdmin');
Route::get('/subadmin/bills',[ApiController::class,'BillingDetails'])->middleware('AuthSubAdmin');
Route::get('subadmin/sendtext',[ApiController::class,'sendText'])->middleware('AuthSubAdmin');






//-------------------------ANIK START-------------------------

// Login
Route::post('/login',[LoginApiController::class,'login']);

// Logout
Route::post('/logout',[LoginApiController::class,'Logout']);

// Registration
Route::post('/registration',[LoginApiController::class,'registration']);

// Homepage
Route::get('/Admin/Home',[APIAdminController::class,'adminHome']);

// See which customer viewd which movie
Route::get('/Admin/CustomersMoviesList',[APIAdminController::class,'adminCheckCustomersMovies']);

// See details of which customer viewd which movie
Route::get('/Admin/CustomersMoviesList/{id}/details',[APIAdminController::class,'adminUserMovieInfo']);

// Search by movie/user name
Route::post('Admin/CustomerMovie/search',[APIAdminController::class,'adminCustomerMovieSubmit']);

// See all users list
Route::get('/Admin/UsersList',[APIAdminController::class,'adminUsersList']);

// Get Customer, subAdmin count
Route::get('/Admin/UsersListCount',[APIAdminController::class,'adminUsersListCount']);

// Change roles of users
Route::get('/Admin/UsersList/{id}/details',[APIAdminController::class,'adminChangeRole']);

// See details of individual users
Route::get('/Admin/UserInfo/{id}/details',[APIAdminController::class,'adminUserInfo']);

// Search users
Route::post('Admin/UsersList/search',[APIAdminController::class,'adminSearchUsersSubmit']);

// Profile picture upload
Route::post('profilepic/upload',[APIAdminController::class,'ProfilePicUp']);

// Change password
Route::post('profilepic/changepass',[APIAdminController::class,'ChangePassword']);

// Self profile info view
Route::post('/userinfo',[LoginApiController::class,'UserInfo']);

//-------------------------ANIK END-------------------------