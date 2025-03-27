<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('apps-hr-employee');
});
Route::get('/e', function () {
    return view('apps-hr-employee');
})->name('users');
Route::get('/l', function () {
    return view('apps-hr-leave');
})->name('tasks');
