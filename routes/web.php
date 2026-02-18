<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::delete('/posts/{post}' , [PostController::class , 'destroy'])->name('posts.destroy');

Route::get('/posts', [MainController::class , 'index']);
Route::get('/posts', [PostController::class , 'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class , 'create'])->name('posts.create');

Route::put('/posts/{post}' , [PostController::class , 'update'] )->name('posts.update');
Route::get('/posts/{post}/edit', [PostController::class , 'edit'])->name('posts.edit');


Route::get('/posts/{post}', [PostController::class , 'show'])->name('posts.show');

Route::post('/posts' , [PostController::class , 'store'])->name('posts.store');



Route::get('/' , [AuthController::class , 'login'])->name('log.login');
Route::post('/login' , [AuthController::class , 'processlogin'])->name('login.process');
Route::get('/logout' , [AuthController::class , 'logout'])->name('log.logout');

Route::get('/register' , [RegistrationController::class,'register'])->name('log.register');
Route::post('/register' , [RegistrationController::class , 'processForm'])->name('register.process');

