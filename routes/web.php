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

Auth::routes();

Route::get('/home', 'HomeController@index');
/**
 * admin Routs
 */
//Route::get('/admin', 'Admin\AdminController@index');

/**
 * 	Admin Auth Routes
 */

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    //Login Routs
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('adminLogin');

    //Logout Routs
    Route::post('logout', 'Auth\LoginController@logout');

    //Password Reset Routs
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
    		->name('admin.password.email');

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
    		->name('admin.password.request');

    Route::post('password/reset', 'Auth\ResetPasswordController@reset')
    		->name('admin.password.request');	

    //Register Routs
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')
    		->name('getAdminRegister');
    Route::post('register', 'Auth\RegisterController@register')
    		->name('adminRegister');

    //Redirect To home after login as a ADMIN.
    Route::get('home', 'AdminController@index')
    		->name('adminHome');	
});


/**
 * Social Auth Routs
 */

Route::get('auth/{provider}', 'SocialAuthController@redirectToProvider')->name('social');
Route::get('auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');
