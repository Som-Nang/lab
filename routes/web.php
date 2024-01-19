<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Inertia\Inertia;

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

// Route::get('/', function () {
//    return "Hello brother";
// });
Route::get('/', function () {
   return Inertia::render('index');
});

// Route::get('/user', [
//    UserController::class, 'user'
// ]);

Route::get('/room', [RoomController::class, 'index'])->name('room.index');


Route::get('/dashboard', function () {
   return Inertia::render('Dashboard');
});

Route::get('/room/create', [RoomController::class, 'create'])->name('room.create');

Route::post('/room/store/{id?}', [RoomController::class, 'store'])->name('room.store');



// login page
Route::get('/user/login', [UserController::class, 'login'])->name('login');

// get login data input from user
Route::post('/user/login', [UserController::class, 'verifyLgin'])->name('login.verify');


require __DIR__ . '/auth.php';
