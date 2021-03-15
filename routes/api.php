<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageMetaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductMediaController;
use App\Http\Controllers\ProductSeoController;
use App\Http\Controllers\ProductVariantOptionController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\CategoryController;
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

header('Access-Control-Allow-Origin: *');

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
      Route::get('logout', [AuthController::class, 'logout']);
      Route::get('user', [AuthController::class, 'user']);
    });
});

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/{category}/products', [CategoryController::class, 'products'])->name('categories.products');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::apiResource('products', ProductController::class);
Route::apiResource('products.medias', ProductMediaController::class)->except(['show']);
Route::apiResource('products.seo', ProductSeoController::class)->except(['show']);
Route::apiResource('products.options', ProductVariantOptionController::class)->except(['show']);
Route::apiResource('products.variants', ProductVariantController::class)->except(['show']);

Route::get('collections', [CollectionController::class, 'index'])->name('collections.index');

Route::get('drafts', [DraftController::class, 'index'])->name('drafts.index');

Route::put('admins/{admin}/password', [AdminController::class, 'updatePassword'])->name('admins.update.password');
Route::apiResource('admins', AdminController::class);
Route::apiResource('menus', MenuController::class);
Route::apiResource('pages', PageController::class);
Route::apiResource('pages.metas', PageMetaController::class)->except(['show']);

Route::get('codes', [CodeController::class, 'index'])->name('codes.index');
Route::get('codes/{cd1}', [CodeController::class, 'show'])->name('codes.show');
Route::get('codes/{cd1}/{cd2}', [CodeController::class, 'show2'])->name('codes.show2');
Route::put('codes/{cd1}/{cd2}', [CodeController::class, 'update'])->name('codes.update');
Route::delete('codes/{cd1}/{cd2}', [CodeController::class, 'destroy'])->name('codes.destroy');
