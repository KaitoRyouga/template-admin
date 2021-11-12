<?php

use App\Libs\RouteLib;
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

// Admin

Route::prefix('ad')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::prefix('auth')->namespace('Auth')->group(function () {
        Route::get('/login', 'AuthController@login')->name('admin.auth.login');
        Route::post('login', 'AuthController@postLogin')->name('admin.auth.postLogin');
        Route::get('/logout', 'AuthController@logout')->name('admin.auth.logout');
    });

    Route::middleware('admin')->group(function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
        RouteLib::generateRoute('setting', 'SettingController', 'setting');
        RouteLib::generateRoute('role', 'RoleController', 'role');
        RouteLib::generateRoute('user', 'UserController', 'user');
        RouteLib::generateRoute('administrator', 'AdministratorController', 'administrator');
        RouteLib::generateRoute('order', 'OrderController', 'order');
        RouteLib::generateRoute('order_item', 'OrderItemController', 'order_item');
        RouteLib::generateRoute('parent_product', 'ParentProductController', 'parent_product');
        RouteLib::generateRoute('product', 'ProductController', 'product');
        RouteLib::generateRoute('article', 'ArticleController', 'article');
        RouteLib::generateRoute('transaction', 'TransactionController', 'transaction');
        RouteLib::generateRoute('category', 'CategoryController', 'category');
        
    });
});