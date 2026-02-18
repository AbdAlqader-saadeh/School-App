<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class , 'show'])->name('books.show');

Route::resource('books', BookController::class);


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/users/1', [UserController::class , 'showstudents'])->name('users.students.show');
Route::get('/users/2', [UserController::class , 'showteachers'])->name('users.teachers.show');

Route::get('/', [StudentController::class, 'login'])->name('login.index');
Route::post('/Login', [StudentController::class, 'processlogin'])->name('login.process');

Route::get('/register', [RegisterController::class, 'index'])->name('log.register');
Route::post('/register' , [RegisterController::class , 'processForm'])->name('register.process');
Route::get('/logout', [RegisterController::class, 'logout'])->name('log.logout');

