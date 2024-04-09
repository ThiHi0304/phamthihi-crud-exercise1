<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('/', [StudentController::class,'index'])->name('index');
Route::get('/add',[StudentController::class,'add'])->name('add');
Route::post('/add',[StudentController::class,'postAdd'])->name('post-add');
Route::get('/edit/{id}',[StudentController::class,'edit'])->name('edit');
Route::post('/edit',[StudentController::class,'postEdit'])->name('post-edit');
Route::get('/delete/{id}',[StudentController::class,'deleteUser'])->name('delete');
