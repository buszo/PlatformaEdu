<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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


Route::get('/logout', 'App\Http\Controllers\HomeController@logout')
    ->name('user.logout');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homeMain');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new', [TaskController::class, 'new'])->name('newTask');

Route::post('/created', [TaskController::class, 'new'])->name('taskCreated');

Route::get('/list', [TaskController::class, 'list'])->name('taskList');

Route::get('/user', [App\Http\Controllers\UserController::class, 'showProfile'])->name('showProfile');
Route::get('/user/edit/data', [App\Http\Controllers\UserController::class, 'editProfile'])->name('editProfile');
Route::post('user/edit/data', [App\Http\Controllers\UserController::class, 'updateData'])->name('userUpdate');
Route::get('/user/edit/password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('changePassword');
Route::post('/user/edit/password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('changePassword');

Route::get('/details/{id}', [TaskController::class, 'taskDetails'])
    ->where(['id' => '[0-9]+'])
    ->name('taskDetails');

Route::delete('/delete/{id}', [TaskController::class, 'deleteTask'])
    ->where(['id' => '[0-9]+'])->name('taskDelete');

Route::get('/editor', [App\Http\Controllers\HomeController::class, 'sheetEditor'])->name('editor');


