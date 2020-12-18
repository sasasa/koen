<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ParksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotosController;
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



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('parks', ParksController::class);
    Route::resource('photos', PhotosController::class, ['except'=>['store']]);
});

Route::resource('parks.photos', PhotosController::class, ['except'=>[
    'index',
    'edit',
    'show',
    'create',
    'update',
    'destroy',
]]);

Route::get('/search', [ParksController::class, 'search'])->name('parks.search');
Route::get('/detail/{park}', [ParksController::class, 'detail'])->name('parks.detail');
Route::get('/user_edit/{park}', [ParksController::class, 'user_edit'])->name('parks.user_edit');
Route::patch('/user_edit/{park}', [ParksController::class, 'user_update'])->name('parks.user_update');

Route::redirect('/', '/search', 301);