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

Route::resource('customer', 'CustomerController');
Route::resource('products','ProductController');
Route::resource('certifications', 'CertificationBodyController');
//Route::resource('auditinfo', 'AuditInfoController');
Route::resource('auditmanagement', 'AuditManagementController');
Route::resource('auditinfo', 'AuditInfoController');
Route::resource('certificationinfo', 'CertificationInfoController');

Route::post('login', 'Auth\LoginController@login');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register','Auth\RegisterController@index')->name('register');
Route::post('register','Auth\RegisterController@register');
Route::get('/subbroker/verify/{token}', 'Auth\RegisterController@verifyUser');

Auth::routes();

Route::get('dashboard', 'HomeController@index')->name('dashboard.index');
