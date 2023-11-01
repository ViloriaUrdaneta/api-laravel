<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

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
    return view('welcome');
});

Route::get('/notification', [NotificationController::class, 'index']) -> name('notification.index');
Route::get('/notification/create', [NotificationController::class, 'create']) -> name('notification.create');
Route::post('/notification', [NotificationController::class, 'store']) -> name('notification.store');
