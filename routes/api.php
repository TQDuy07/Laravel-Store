<?php
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Api login
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    //Store
    Route::get('/store/search', [StoreController::class, 'search']);
    Route::get('/store/detail/{id}', [StoreController::class, 'detail']);
    Route::post('/store/create', [StoreController::class, 'create']);
    Route::post('/store/update', [StoreController::class, 'update']);
    Route::delete('/store/delete/{id}', [StoreController::class, 'delete']);

    //Product
    Route::get('/product/search', [ProductController::class, 'search']);
    Route::get('/product/detail/{id}', [ProductController::class, 'detail']);
    Route::post('/product/create', [ProductController::class, 'create']);
    Route::post('/product/update', [ProductController::class, 'update']);
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete']);
});


