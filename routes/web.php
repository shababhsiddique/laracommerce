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


/* Site */
Route::get('/', 'ShopController@index')->name('home');
Route::get('/home', 'ShopController@index')->name('home');
Route::get('/product/{product_id}', 'ShopController@productDetails')->name('product');
Route::get('/products/{category_id}/{category_name}', 'ShopController@productCategory');
Route::get('/search', 'ShopController@productSearch');
Route::get('/contact', 'ShopController@contact')->name('contact');

/* Auth Generated */
Auth::routes();






/**
 * Admin Start
 */

/* Admin Login*/
Route::get('/admin', 'AdminLoginController@index');
Route::post('/adminverify', 'AdminLoginController@verify');

/* Admin Dashboard*/
Route::get('/adminlogout','AdminController@logout');
Route::get('/dashboard', 'AdminController@index');


/* Category Management */
Route::get('/admin/add-category', 'AdminController@addCategory');
Route::post('/admin/save-category', 'AdminController@saveCategory');

Route::get('/admin/list-category', 'AdminController@listAllCategory');

Route::get('/admin/delete-category/{status}/{id}', 'AdminController@deleteCategory');
Route::get('/admin/changestatus-category/{status}/{id}', 'AdminController@changeCategoryStatus');

Route::get('/admin/edit-category/{id}', 'AdminController@editCategory');
Route::post('/admin/update-category', 'AdminController@updateCategory');


/* Brand Management */
Route::get('/admin/list-brands', 'AdminController@listAllBrands');

Route::get('/admin/new-brand', 'AdminController@newBrand');
Route::get('/admin/edit-brand/{id}', 'AdminController@editBrand');
Route::post('/admin/save-brand', 'AdminController@saveBrand');

Route::get('/admin/changestatus-brand/{status}/{id}', 'AdminController@changeBrandStatus');



/* Product Management */
Route::get('/admin/list-products', 'AdminController@listAllProduct');

Route::get('/admin/new-product', 'AdminController@newProduct');
Route::get('/admin/edit-product/{id}', 'AdminController@editProduct');
Route::post('/admin/save-product', 'AdminController@saveProduct');

Route::get('/admin/changestatus-product/{status}/{id}', 'AdminController@changeProductStatus');


/* Site Management*/
Route::get('/admin/manage-slider', 'AdminController@manageFrontSlider');
Route::post('/admin/upload-slider', 'AdminController@saveSliderImages');
Route::get('/admin/delete-slider-image/{img}', 'AdminController@deleteSliderImage');





Route::get('/test', 'AdminController@test');
//Route::get('/dashboard', 'AdminController@adminLogin');


