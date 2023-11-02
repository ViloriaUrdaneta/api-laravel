<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\X_usuarioController;

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

Route::get('/xusuario', [X_usuarioController::class, 'xusuario']);

Route::post('/register', [X_usuarioController::class, 'register'])->withoutMiddleware('web');

Route::group(['middleware' => ['cors']], function () {
    
    Route::post('/login', [X_usuarioController::class, 'login'])->withoutMiddleware('web');
}); 
