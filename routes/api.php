<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SucursalController;
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
//public routes

Route::post('register',[AuthController::class, "register"]);
Route::post('login',[AuthController::class, "login"]);
//Route::get('products/search/{name}',[ProductController::class, "search"]);
//Route::get('p roducts',[ProductController::class, "index"]);
//Route::post('products',[ProductController::class, "store"]);
//protected routes
Route::group(["middleware" => ['auth:sanctum']], function () {
    Route::get('products/search/{name}',[ProductController::class, "search"]);
    Route::resource('products',ProductController::class);
    Route::post('logout',[AuthController::class, "logout"]);    
    //sucursal
    Route::get('branchOffice',[SucursalController::class, "index"]);    
    Route::post('branchOffice/register',[SucursalController::class, "create"]);    
    // Route::get('branchOffice/edit',[SucursalController::class, "create"]);    
});
Route::middleware('auth:sanctum')->get('/user', function () {
    return $request->user();
});
