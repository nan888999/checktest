<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

Route::get('/', [ContactController::class, 'index']);

Route::post('/contacts/confirm',[ContactController::class,'confirm']);

Route::post('/contacts',[ContactController::class, 'store']);

Route::post('/contacts/back', [ContactController::class, 'back'])->name('contact.back');

Route::get('/contacts',[ContactController::class, 'thanks']);

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'authenticate']);

Route::get('/register', [UserController::class, 'register']);

Route::post('/register', [UserController::class, 'create']);

Route::middleware('auth')->group(function () {
  Route::get('/admin', [UserController::class, 'admin']);
});

Route::get('/find', [UserController::class, 'find']);
Route::post('/find', [UserController::class, 'search']);

Route::get('/contact/{id}', [UserController::class,'show']);