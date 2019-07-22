<?php

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
    return view('welcome');
});


Route::resource('users','usersController');
Route::post('users/addtransaction', 'usersController@create')->name('barangs.addtransaction');
Route::post('/proses','usersController@save')->name('users.proses');
Route::get('/riwayat','usersController@riwayat')->name('users.riwayat');
Route::get('users/detail/{id}','usersController@detail')->name('users.detail');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/users/logout', 'Auth\LoginController@userLogout')->name('users.logout');

Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dasboard');
  Route::resource('/barangs','barangController');
  Route::get('/pembelian','barangController@pembelian')->name('barangs.pembelian');
  Route::get('/detailAmdmin/{id}','barangController@detailAdmin')->name('barangs.detailAdmin');

  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});



// Route::controller('datatables', 'usersController', [
//     'anyData'  => 'datatables.data',
//     'getIndex' => 'datatables',
// ]);
