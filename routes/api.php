<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageMetaController;
use App\Http\Controllers\ProductController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
      Route::get('logout', [AuthController::class, 'logout']);
      Route::get('user', [AuthController::class, 'user']);
    });
});

Route::get('products', [ProductController::class, 'index'])->name('products.index');

Route::get('drafts', [DraftController::class, 'index'])->name('drafts.index');

Route::put('admins/{admin}/password', [AdminController::class, 'updatePassword'])->name('admins.update.password');
Route::apiResource('admins', AdminController::class);
Route::apiResource('menus', MenuController::class);
Route::apiResource('pages', PageController::class);
Route::apiResource('pages.metas', PageMetaController::class)->except(['show']);

Route::get('codes', [CodeController::class, 'index'])->name('codes.index');
Route::get('codes/{cd1}', [CodeController::class, 'show'])->name('codes.show');
