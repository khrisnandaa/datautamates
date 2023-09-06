<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/admin', function(){
//     return view('admin.index');
// })->name('admin.index')->middleware('auth');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('index');

Route::controller(Controllers\ProductController::class)
    ->prefix('/product')
    ->middleware('auth')
    ->name('product.')
    ->group(function () {
        Route::get('/', 'index')->name('index'); // product.index
        Route::post('/', 'store')->name('store'); // product.store
        Route::get('/hapus/{id}', 'remove')->name('remove');
        Route::get('/editform/{id}', 'editform')->name('editform');
        Route::post('/edit/{id}', 'edit')->name('edit');
    });
Route::controller(Controllers\TransactionController::class)
    ->prefix('/transaction')
    ->middleware('auth')
    ->name('transaction.')
    ->group(function () {
        Route::get('/', 'index')->name('index'); // product.index
    });
