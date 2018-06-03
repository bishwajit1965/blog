<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|--------------------------------------------------------------------------
*/

// User Routes
Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/post/{post?}', 'PostController@post')->name('post');
    // Will fetch Tag specific posts
    Route::get('post/tag/{tag}', 'Homecontroller@tag')->name('tag');
    // Will fetch Category specific posts
    Route::get('post/category/{category}', 'Homecontroller@category')->name('category');
});

// Admin Routes
Route::group(['namespace' => 'Admin'], function () {
    Route::get('admin/home', 'AdminHomeController@index')->name('admin.home');
    Route::get('admin/calendar', 'CalendarController@index')->name('admin.calendar');
    // Admin Users Routes
    Route::resource('admin/user', 'UserController');
    // Admin Roles Routes
    Route::resource('admin/role', 'RoleController');
    // Admin Permission Routes
    Route::resource('admin/permission', 'PermissionController');
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/category', 'CategoryController');
    Route::resource('admin/tag', 'TagController');
    Route::resource('admin/user', 'UserController');
    // Admin Auth routes
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
