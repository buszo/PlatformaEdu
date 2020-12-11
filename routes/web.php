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

Route::get('/new', [TaskController::class, 'index'])->name('newTaskIndex');
Route::post('/created', [TaskController::class, 'new'])->name('taskCreated');
Route::post('/updated/{id}', [TaskController::class, 'updateTask'])->name('taskUpdate');
Route::post('/createCategory', [TaskController::class, 'newCategory'])->name('categoryCreate');

Route::get('/list', [TaskController::class, 'list'])->name('taskList');
Route::get('/list/{category?}', [TaskController::class, 'listByCategory'])->name('taskListByCategory');

Route::get('/user', [App\Http\Controllers\UserController::class, 'showProfile'])->name('showProfile');
Route::get('/user/edit/data', [App\Http\Controllers\UserController::class, 'editProfile'])->name('editProfile');
Route::post('user/edit/data', [App\Http\Controllers\UserController::class, 'updateData'])->name('userUpdate');
Route::get('/user/edit/password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('changePassword');
Route::post('/user/edit/password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('changePassword');
Route::get('/user/upload', [App\Http\Controllers\UserController::class, 'changeAvatar'])->name('changeAvatar');
Route::post('/user/upload', [App\Http\Controllers\UserController::class, 'upload'])->name('upload');
Route::get('/details/{id}', [TaskController::class, 'taskDetails'])
    ->where(['id' => '[0-9]+'])
    ->name('taskDetails');

Route::delete('/delete/{id}', [TaskController::class, 'deleteTask'])
    ->where(['id' => '[0-9]+'])->name('taskDelete');

Route::get('/editor', [App\Http\Controllers\HomeController::class, 'sheetEditor'])->name('editor');
Route::get('/editor/{id}', [App\Http\Controllers\HomeController::class, 'sheetEditor'])
->where(['id' => '[0-9]+'])->name('editSheet');
Route::get('/generatePdf', [App\Http\Controllers\HomeController::class, 'generatePdf'])->name('pdf');
Route::get('/getTasks', [App\Http\Controllers\HomeController::class, 'getTasks'])->name('getTask');
Route::get('/sheetList', [App\Http\Controllers\HomeController::class, 'sheetList'])
->name('sheetList');

Route::post('/sheetList', [App\Http\Controllers\HomeController::class, 'sheetList'])
->name('sheetListPost');


Route::post('/save', [App\Http\Controllers\HomeController::class, 'save'])->name('save');
Route::get('/show/{id}', [App\Http\Controllers\HomeController::class, 'showSheet'])
    ->where(['id' => '[0-9]+'])->name('show');
Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'userProfile'])
->where(['id' => '[0-9]+'])->name('userProfile');
Route::get('/sheet/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteSheet'])
    ->where(['id' => '[0-9]+'])->name('sheetDelete');

