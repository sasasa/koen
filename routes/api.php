<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SearchParksController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['api']], function(){
    Route::post('/parks_by_location', [SearchParksController::class, 'search_by_location'])->
    name('api.parks.search_by_location');
    Route::post('/parks_from_map', [SearchParksController::class, 'search_from_map'])->
    name('api.parks.search_from_map');
});
