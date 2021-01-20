<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ParksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\InquiriesController;
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



Route::get('/search_feature', [ParksController::class, 'search'])->name('parks.search');
Route::get('/search_map', [ParksController::class, 'search_map'])->name('parks.search_map');
Route::get('/search_by_location', [ParksController::class, 'search_by_location'])->name('parks.search_by_location');
Route::get('/search_by_plant_and_animal/{tag?}', [ParksController::class, 'search_by_plant_and_animal'])->name('parks.search_by_plant_and_animal');
Route::get('/detail/{park}', [ParksController::class, 'detail'])->name('parks.detail');
Route::get('/user_edit/{park}', [ParksController::class, 'user_edit'])->name('parks.user_edit');
Route::patch('/user_edit/{park}', [ParksController::class, 'user_update'])->name('parks.user_update');

Route::get('/', [RootController::class, 'index'])->name('root.index');
Route::get('/article/{article}', [RootController::class, 'show'])->name('root.show');
Route::get('/article', [RootController::class, 'list'])->name('root.list');
Route::get('/terms_of_use', [RootController::class, 'terms_of_use'])->name('root.terms_of_use');
Route::get('/about_advertising', [RootController::class, 'about_advertising'])->name('root.about_advertising');
Route::get('/privacy_policy', [RootController::class, 'privacy_policy'])->name('root.privacy_policy');


Route::resource('/inquiries', InquiriesController::class)->only([
    'create', 'store',
]);
Route::get('/inquiries/done', [InquiriesController::class, 'done'])->name('inquiries.done');

Route::resource('/parks.photos', PhotosController::class)->only([
    'store', 'show',
]);
Route::post('/parks/{park}/reviews', [ReviewsController::class, 'store'])->name('parks.reviews.store');



Route::get('/sitemap.xml', [SiteMapController::class, 'sitemap'])->name('sitemap');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('/parks', ParksController::class);
    Route::resource('/photos', PhotosController::class)->except([
        'store', 'show',
    ]);
    Route::resource('/reviews', ReviewsController::class)->except([
        'store',
    ]);
    Route::resource('/tags', TagsController::class);
    Route::resource('/articles', ArticlesController::class);
    Route::resource('/inquiries', InquiriesController::class)->except([
        'create', 'store',
    ]);
});