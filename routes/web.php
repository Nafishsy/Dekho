<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\accountsController;
use App\Http\Controllers\adminController;

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
Route::get('/subadmin/Video',[SubAdminController::class,'Videos'])->name('SubAdmin.Videos');
Route::get('/subadmin/Videolist',[SubAdminController::class,'MovieList'])->name('SubAdmin.VideoList');
Route::post('/subadmin/Videolist',[SubAdminController::class,'SearchMovieSubmit'])->name('SubAdmin.VideoList.Search.Submit');
Route::get('/subadmin/movie/details/{id}/info',[SubAdminController::class,'details'])->name('Movie.details');
Route::post('/subadmin/movie/details/{id}/info',[SubAdminController::class,'UpdateMovie'])->name('Movie.details.Edit');
Route::get('/subadmin/movie/delete/{id}',[SubAdminController::class,'DeleteMovie'])->name('Movie.delete');
Route::get('/subadmin/movie/download/{id}',[SubAdminController::class,'DownloadMovie'])->name('Movie.download');
Route::get('/subadmin/bills',[SubAdminController::class,'BillingDetails'])->name('Movie.Bills');
Route::post('/subadmin/bills',[SubAdminController::class,'BillingDetailsSearch'])->name('Movie.Bills.Search');
Route::get('/subadmin/bills/change/{id}',[SubAdminController::class,'StatusChange'])->name('Subadmin.Customer.Change');
Route::post('/subadmin/bills/change/{id}',[SubAdminController::class,'UpdateStatus'])->name('Subadmin.Customer.Update');
//Route::get('/subadmin/movies/list/search',[SubAdminController::class,'SearchMovie'])->name('Subadmin.Movies.List.Search');

//anik

Route::get('/',[accountsController::class,'publicLogin'])->name('public.login');
Route::post('/',[accountsController::class,'publicLoginSubmit'])->name('public.login.submit');
Route::get('/Logout',[accountsController::class,'publicLogout'])->name('public.logout');
Route::get('/Registration',[accountsController::class,'publicRegistration'])->name('public.registration');
Route::post('/Registration',[accountsController::class,'publicRegistrationSubmit'])->name('public.registration.submit');


Route::get('/ForgotPassword',[accountsController::class,'publicForgotPassword'])->name('public.forgotPassword');
Route::post('/ForgotPassword',[accountsController::class,'publicOTP'])->name('public.forgotPassword.otp.sent');
Route::get('/OTP/submit',[accountsController::class,'viewFogretPass'])->name('public.viewFogretPass');
Route::post('/OTP/submit',[accountsController::class,'publicOTPcheck'])->name('public.OTPcheck.submit');

Route::get('/public/PassChange',[accountsController::class,'ViewChangePass'])->name('public.PassChange');
Route::post('/public/PassChange',[accountsController::class,'PassChange'])->name('public.PassChange.submit');


Route::get('/Admin/Dashboard',[adminController::class,'adminDashboard'])->name('admin.dashboard')->middleware('adminLoginCheckMiddleware');
Route::get('/Admin/Profile',[adminController::class,'adminProfile'])->name('admin.profile')->middleware('adminLoginCheckMiddleware');
Route::get('/Admin/ChangePassword',[adminController::class,'adminChangePassword'])->name('admin.changePassword')->middleware('adminLoginCheckMiddleware');
Route::post('/Admin/ChangePassword',[adminController::class,'adminChangePasswordSubmit'])->name('admin.changePassword.submit')->middleware('adminLoginCheckMiddleware');
Route::get('/Admin/Dashboard',[adminController::class,'adminCheckCustomersMovies'])->name('admin.checkCustomersMovies')->middleware('adminLoginCheckMiddleware');
Route::get('/Admin/CustomerList',[adminController::class,'adminUserList'])->name('admin.userlist')->middleware('adminLoginCheckMiddleware');
Route::post('/Admin/CustomerList',[adminController::class,'adminSearchUsersSubmit'])->name('admin.searchUsers.submit')->middleware('adminLoginCheckMiddleware');;
Route::get('/Admin/CustomerList/{id}/details',[adminController::class,'adminChangeRole'])->name('admin.changeRole')->middleware('adminLoginCheckMiddleware');
Route::post('/Admin/CustomerList/{id}/details',[adminController::class,'adminChangeRoleSubmit'])->name('admin.changeRole.submit')->middleware('adminLoginCheckMiddleware');