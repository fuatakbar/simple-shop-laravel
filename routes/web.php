<?php

use App\Http\Controllers\Cms\UserListController;
use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/product/detail/{id?}', [HomeController::class, 'detail'])
    ->name('product-detail');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/user-list', [UserListController::class, 'index'])->name('admin.user-list');
    Route:;put('/user-list/approve/{id}', [UserListController::class, 'approveUser'])->name('admin.user-list.approve');
});
