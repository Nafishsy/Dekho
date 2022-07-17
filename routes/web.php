<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UsersController;

Route::get('/home',[UsersController::class,'home'])->name('home');
Route::get('/search',[UsersController::class,'search'])->name('search');
//login
Route::get('/login',[UsersController::class,'login'])->name('login');
//logout
Route::get('/logout',[UsersController::class,'logout'])->name('logout');
Route::get('DropdownSearch/{id}',[UsersController::class,'DropdownSearch'])->name('DropdownSearch');
Route::get('Watchmovie/{id}',[UsersController::class,'Watchmovie'])->name('Watchmovie');








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

