<?php
/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProvidersController;
use Illuminate\Support\Facades\Route;


Route::get("/providers/index", [ProvidersController::class, 'index']);



//================= Routes related to products =================
//

//  url to get a list of all products 
Route::get("/products", [ProductsController::class, 'index']);
//  url to get view and create new providers
Route::get("/products/create", [ProductsController::class, 'create']);
//  url to make post request and store data of new created product 
Route::post("/products/store", [ProductsController::class, 'store']);
//  url to get information of a specified product from data base
Route::get("/products/{id}/details", [ProductsController::class, 'show']);

// ==================== routes related to providers ====================
//route to get all providers from data base
Route::get("/providers", [ProvidersController::class, 'index']);
// route to get a provider by a specified id
Route::get("/providers/create", [ProvidersController::class, 'create']);
// route to get view that containst information about a provider by a specified id
Route::get("/providers/{id}/details", [ProvidersController::class, 'show']);
// route to save new  provider 
Route::post("/providers/store", [ProvidersController::class, 'store']);

/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */