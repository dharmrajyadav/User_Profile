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

Route::get('/', function () {
    return view('users/create_user');
});




Route::post('/createUser/store','User@createUser')->name('user.form');

Route::get('/getUserDetails','User@getUserData');

Route::get('/getUserDetails/{id}/view','User@viewUserData')->name('user.getDetail');
// Route::post('/updateUserData','User@userUpdate')->name('user.getDetailupdate');

Route::get('/dataDelete/{id}','User@userDelete')->name('user.delete');

Route::get('/getLogin','UserLogin@getLoginView');

Route::get('/userLogin','UserLogin@getLoginData')->name('user.login');
