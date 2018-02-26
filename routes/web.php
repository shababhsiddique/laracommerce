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

/* Blog */
Route::get('/', 'ShopController@index')->name('home');
Route::get('/contact', 'ShopController@contact')->name('contact');

/* Auth Generated */
Auth::routes();



/* Admin Login*/
Route::get('/admin', 'AdminLoginController@index');
Route::post('/adminverify', 'AdminLoginController@verify');

/* Admin Panel*/
Route::get('/adminlogout','AdminController@logout');
Route::get('/dashboard', 'AdminController@index');


/* Category Management */
Route::get('/admin/add-category', 'AdminController@addCategory');
Route::post('/save-category', 'AdminController@saveCategory');

Route::get('/admin/list-category', 'AdminController@listAllCategory');

Route::get('/admin/delete-category/{status}/{id}', 'AdminController@deleteCategory');
Route::get('/admin/changestatus-category/{status}/{id}', 'AdminController@changeCategoryStatus');

Route::get('/admin/edit-category/{id}', 'AdminController@editCategory');
Route::post('/update-category', 'AdminController@updateCategory');


/* Article Management */
Route::get('/admin/list-articles', 'AdminController@listAllArticle');

Route::get('/admin/new-article', 'AdminController@newArticle');
Route::get('/admin/edit-article/{id}', 'AdminController@editArticle');
Route::post('/save-article', 'AdminController@saveArticle');

Route::get('/admin/changestatus-article/{status}/{id}', 'AdminController@changeArticleStatus');






Route::get('/test', 'AdminController@test');
//Route::get('/dashboard', 'AdminController@adminLogin');

