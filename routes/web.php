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
    return redirect()->route('login');
});

Route::get('/admin-login', function () {
    return view('login');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@index')->name('admin-dashboard');

    Route::get('/admin/account', 'App\Http\Controllers\admin\AccountController@index')->name('admin-account');
    Route::post('/admin/add-account', 'App\Http\Controllers\admin\AccountController@add')->name('admin-add-account');

    Route::get('/admin/products', 'App\Http\Controllers\admin\ProductController@index')->name('admin-products');
    Route::get('/admin/new-product', 'App\Http\Controllers\admin\ProductController@new')->name('admin-new-product');
    Route::get('/admin/update-product/{id}', 'App\Http\Controllers\admin\ProductController@update')->name('admin-update-product');
    Route::post('/admin/add-product', 'App\Http\Controllers\admin\ProductController@add')->name('admin-add-product');
    Route::post('/admin/edit-product', 'App\Http\Controllers\admin\ProductController@edit')->name('admin-edit-product');
    Route::get('/admin/delete-product/{id}', 'App\Http\Controllers\admin\ProductController@delete')->name('admin-delete-product');
    Route::get('/admin/product/{id}', 'App\Http\Controllers\admin\ProductController@items')->name('admin-product');

    Route::get('/admin/sales', 'App\Http\Controllers\admin\SaleController@index')->name('admin-sales');
    Route::get('/admin/sale/{id}', 'App\Http\Controllers\admin\SaleController@items')->name('admin-sale');

    Route::get('/admin/users', 'App\Http\Controllers\admin\UserController@index')->name('admin-users');

    Route::get('/admin/message/{userid}', 'App\Http\Controllers\admin\MessageController@index')->name('admin-messages');
    Route::post('/admin/send', 'App\Http\Controllers\admin\MessageController@send')->name('admin-send');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/user/dashboard', 'App\Http\Controllers\user\DashboardController@index')->name('user-dashboard');
    Route::post('/user/checkout', 'App\Http\Controllers\user\CartController@checkout')->name('user-checkout');
    Route::get('/user/delete/{id}', 'App\Http\Controllers\user\CartController@delete')->name('user-delete-cart');
    Route::get('/user/add/{id}', 'App\Http\Controllers\user\CartController@add')->name('user-add-cart');

    Route::get('/user/sales', 'App\Http\Controllers\user\SaleController@index')->name('user-sales');
    Route::get('/user/sale/{id}', 'App\Http\Controllers\user\SaleController@items')->name('user-items');

    Route::get('/product/check', 'App\Http\Controllers\user\SaleController@check')->name('user-checks');
    Route::post('/product/search', 'App\Http\Controllers\user\SaleController@verify')->name('user-check-search');

    Route::get('/message', 'App\Http\Controllers\user\MessageController@index')->name('user-messages');
    //Route::get('/delete', 'App\Http\Controllers\user\SaleController@index')->name('user-messages');
    Route::post('/send', 'App\Http\Controllers\user\MessageController@send')->name('user-send');
});

require __DIR__.'/auth.php';
