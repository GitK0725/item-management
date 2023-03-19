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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// 商品登録
Route::prefix('items')->group(function () {

    
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/update', [App\Http\Controllers\ItemController::class, 'update']);
    // 削除処理
    Route::post('/delete', [App\Http\Controllers\ItemController::class, 'delete']);
});


Route::prefix('users')->group(function () {
    // ユーザー一覧画面
    Route::get('/', [App\Http\Controllers\UserController::class,'index']);
    
    // ユーザー編集画面
    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');

});
