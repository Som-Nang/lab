<?php

use App\Http\Controllers\ComputerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatusController;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\RedirectToUserLogin;
use App\Http\Middleware\IsAdmin;
use GuzzleHttp\Promise\Is;
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


// Route::get('/user', [
//    UserController::class, 'user'
// ]);
Route::get('/', function () {
   return redirect()->route('dashboard');
});
Route::middleware(CheckLogin::class)->group(function () {
   Route::prefix('/room')->controller(RoomController::class)->name('room.')->group(function () {
      //Room
      Route::get('/', 'index')->name('index');
      //Create Room
      Route::get('/create', 'create')->name('create');

      //Store Room data
      Route::post('/store/{id?}', 'store')->name('store');

      //Edit Room
      Route::get('/edit/{id}', 'edit')->name('edit');

      //Edit date
      // Route::put('/edit/{id}', 'update')->name('update');

      //Delete Room
      Route::delete('/delete/{id}', 'destroy')->name('destroy');
   });

   Route::prefix('/status')->controller(StatusController::class)->name('status.')->group(function () {
      Route::get('/', 'index')->name('index');

      route::get('/edit/{id}', 'edit')->name('edit');

      Route::post('/store/{id?}', 'store')->name('store');

      Route::delete('/delete/{id}', 'destroy')->name('destroy');
   });
   // Dashboard
   Route::get('/dashboard1', function () {
      return Inertia::render('Dashboard');
   });


   // Computer
   Route::resource('/computer', ComputerController::class);



   Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

// login page
Route::get('/user/login', [UserController::class, 'login'])->middleware(RedirectToUserLogin::class)->name('login');

// get login data input from user
Route::post('/user/login', [UserController::class, 'verifyLgin'])->name('login.verify');

// Test ISadmin Middleware
Route::get('/is-admin', function () {
   return "Hello Admin";
})->middleware(IsAdmin::class);
require __DIR__ . '/auth.php';
