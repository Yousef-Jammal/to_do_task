<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Events\NewNotification;
use App\Models\User;


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




// Auth Routes
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit'); 
Route::get('/register', [RegisterController::class, 'show'])->name('register');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/login', [LoginController::class, 'show'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');


Route::middleware(['auth', 'can:admin-access'])->prefix('admin-panel')->group(function () {
    
    Route::get('/users', function () {
        return view('admin-panel/users'); 
    })->name('users');
    
    Route::get('/tasks', function () {
        return view('admin-panel/tasks');
    })->name('tasks');
 
});   
    
    
Route::middleware(['auth'])->group(function () {

    Route::get('/tasks', function () {
        return view('pages/tasks');
    })->name('user-task');

});
