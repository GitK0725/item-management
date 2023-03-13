<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// 追加
Route::prefix('user')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 // 登録
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
// 編集
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
 // 保存
    Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update']);
 // 削除
    Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']);

});


// 最初からあったもの
Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/delete', [App\Http\Controllers\ItemController::class, 'delete']); 

});
