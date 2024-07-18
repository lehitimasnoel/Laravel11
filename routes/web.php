<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user',[UserController::class, 'index'])->name('user.index');
Route::get('/user/create',[UserController::class, 'create'])->name('user.create');
Route::post('/user/store',[UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit',[UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}',[UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}',[UserController::class, 'destroy'])->name('user.destroy');

