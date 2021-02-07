<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\frontentController;
use App\Http\Controllers\productController;
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



route::get('/','frontentController@index')->name('frontent.home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::get('admin/logout','adminController@logout')->name('admin.logout');

//==============category==============//
route::get('category','categoryController@category')->name('categories');
route::post('store/category','categoryController@storeCategory');
route::get('edit/category/{id}','categoryController@editCategory');
route::POST('update/category/{id}','categoryController@updateCategory');
route::get('delete/category/{id}','categoryController@deleteCategory');
route::get('inactive/category/{id}','categoryController@inactiveCategory');
route::get('active/category/{id}','categoryController@activeCategory');

//===============BRAND================//
route::get('brands','brandController@homeBrand')->name('brands');
route::post('store/brand','brandController@storeBrand');
route::get('edit/brand/{id}','brandController@editbrand');
route::post('update/brand/{id}','brandController@updateBrand');
route::get('delete/brand/{id}','brandController@deleteBrand');
route::get('inactive/brand/{id}','brandController@inactiveBrand');
route::get('active/brand/{id}','brandController@activeBrand');

//================PRODUCT==================//
route::get('add/product','productController@addProduct');
route::post('store/product','productController@storeProduct');
route::get('manage/product','productController@manageProduct')->name('manage.product');
route::get('edit/product/{id}','productController@editProduct');
route::post('update/product/{id}','productController@updateProduct');
route::get('delete/product/{id}','productController@deleteProduct');
route::get('inactive/product/{id}','productController@inactiveProduct');
route::get('active/product/{id}','productController@activeProduct');

