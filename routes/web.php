<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ParksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\TagsController;
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
    Route::resource('photos', PhotosController::class, ['except'=>['store', 'show',]]);
    Route::resource('reviews', ReviewsController::class, ['except'=>['store']]);
    Route::resource('tags', TagsController::class);
});

Route::get('/search_feature', [ParksController::class, 'search'])->name('parks.search');
Route::get('/search_by_plant_and_animal/{comment?}', [ParksController::class, 'search_by_plant_and_animal'])->name('parks.search_by_plant_and_animal');
Route::get('/detail/{park}', [ParksController::class, 'detail'])->name('parks.detail');
Route::get('/user_edit/{park}', [ParksController::class, 'user_edit'])->name('parks.user_edit');
Route::patch('/user_edit/{park}', [ParksController::class, 'user_update'])->name('parks.user_update');

Route::view('/', 'index')->name('index');

Route::resource('parks.photos', PhotosController::class, ['except'=>[
    'index',
    'edit',
    'create',
    'update',
    'destroy',
]]);
Route::resource('parks.reviews', ReviewsController::class, ['except'=>[
    'index',
    'edit',
    'show',
    'create',
    'update',
    'destroy',
]]);
