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

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]); //for email verification==>['verify' => true]

Route::get('showVerificationMsg','HomeController@showVerificationMsg')->middleware('verified');

// admin/admin
Route::get('/', 'Admin\AdminController@index')->middleware('auth','can:isAdmin');
Route::get('/admin', 'Admin\AdminController@index')->name('admin.admin.index')->middleware('auth','can:isAdmin');
// admin/category
Route::get('/admin/category', 'Admin\AdminController@showCategoryForm')->name('admin.category.showCategoryForm')->middleware('auth','can:isAdmin');
Route::post('/admin/getAllcategories', 'Admin\AdminController@getAllcategories')->name('admin.category.getAllcategories')->middleware('auth','can:isAdmin');
Route::post('/admin/getCategoryAbyId', 'Admin\AdminController@getCategoryAbyId')->name('admin.category.getCategoryAbyId')->middleware('auth','can:isAdmin');
Route::post('/admin/getCategoryBbyId', 'Admin\AdminController@getCategoryBbyId')->name('admin.category.getCategoryBbyId')->middleware('auth','can:isAdmin');
Route::post('/admin/getCategoryCbyId', 'Admin\AdminController@getCategoryCbyId')->name('admin.category.getCategoryCbyId')->middleware('auth','can:isAdmin');
// admin/product
Route::get('/admin/product/showCarouselOne', 'Admin\ProductController@showCarouselOne')->name('admin.product.showCarouselOne')->middleware('auth','can:isAdmin');
Route::post('/admin/product/getCarouselOne', 'Admin\ProductController@getCarouselOne')->name('admin.product.getCarouselOne')->middleware('auth','can:isAdmin');
Route::post('/admin/product/editCarouselOne', 'Admin\ProductController@editCarouselOne')->name('admin.product.editCarouselOne')->middleware('auth','can:isAdmin');
// admin/user
Route::get('/user-index', 'Admin\UserController@index')->name('admin.user.index')->middleware('auth','can:isAdmin');
Route::get('/get-users', 'Admin\UserController@getUsers')->middleware('auth','can:isAdmin');
Route::post('/edit-user', 'Admin\UserController@editUser')->middleware('auth','can:isAdmin');
