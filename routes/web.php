<?php

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
    Route::get('/user-list', function(){
        //
    })->name('admin.user-list');
});
