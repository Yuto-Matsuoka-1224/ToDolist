<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\TaskdemoController; 

/* ルーティング設定 */

Route::get('/', [TaskdemoController::class,'top'])->name('toppage');
Route::get('/demo', [TaskdemoController::class,'list'])->name('home');
Route::get('/taskdemos/complete', [TaskdemoController::class,'complete'])->name('complete');
Route::resource('taskdemos', 'TaskdemoController');