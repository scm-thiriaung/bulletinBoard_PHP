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
Route::resource('user','userController');
Route::get('/index','userController@index');
// User Register
Route::get('/register','userController@register')->name('register');
Route::post('/register','userController@register')->name('register');
// Check whether user is authorize
Route::post('/registerUser', 'userController@registerUser')->name('registerUser');
// User Login
Route::get('/login','userController@login')->name('login');
// Check whether user is authorize
Route::post('/user/checklogin', 'userController@checklogin')->name('checklogin');
// Show all User
Route::get('/userList', 'UserController@userList')->name('userList');
// Search User
Route::get('/userSearch', 'UserController@userSearch')->name('userSearch');
// Change Password
Route::get('/changePassword', 'UserController@changePassword')->name('changePassword');
// Update Password in Database
Route::post('/updatePassword', 'UserController@updatePassword')->name('updatePassword');
// Request email from user
Route::get('forget-password', 'UserController@showForgetPasswordForm')->name('forget.password.get');
// check user is exit or not in database and send mail to user email
Route::post('forget-password', 'UserController@submitForgetPasswordForm')->name('forget.password.post'); 
// Request new password from user
Route::get('reset-password/{token}', 'UserController@showResetPasswordForm')->name('reset.password.get');
// Updating the new password in database
Route::post('reset-password', 'UserController@submitResetPasswordForm')->name('reset.password.post');
// User Logout
Route::get('/logout', 'UserController@logout')->name('logout');

Route::resource('post','postController');
// Search Post
Route::get('/findPost','postController@findPost')->name('findPost');
Route::post('/postMethod','postController@postMethod')->name('postMethod');
// Export to csv
Route::get('/exportExcel','postController@exportExcel')->name('exportExcel');
Route::post('/exportExcel','postController@exportExcel')->name('exportExcel');
// Import to excel
Route::get('/importExcel','PostController@importExcel')->name('importExcel');
Route::post('/importExcel','PostController@importExcel')->name('importExcel');

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
