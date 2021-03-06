<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\TaskController;

/* ルーティング設定 */

Route::get('/', 'TaskController')->name('dashboard');
Route::get('/tasks/complete', [TaskController::class,'complete'])->name('complete');
Route::get('/tasks/complete/RATE', [TaskController::class,'RATE'])->name('RATE');
//Route::put('/tasks/estiminate', [TaskController::class,'estiminate'])->name('estiminate');
Route::resource('tasks', 'TaskController')->except('show');
Route::group(['middleware' => 'can:admin'], function () {
    Route::resource('users', 'UserController')->except('show');
});