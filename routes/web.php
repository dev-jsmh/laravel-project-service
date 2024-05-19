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

//================= Routes related to products =================
//
//  url to get a list of all products 
Route::get("/products", [ProductsController::class, 'index']);
//  url to get view and create new product
Route::get("/products/create", [ProductsController::class, 'create']);
//  url to make post request and store data of new created product 
Route::post("/products/store", [ProductsController::class, 'store']);
//  url to get information of a specified product from data base
Route::get("/products/{id}/details", [ProductsController::class, 'show']);
//  url to delete a specified product 
Route::get("/products/{id}/delete", [ProductsController::class, 'destroy']);
// -------------------------- new added routes ---------------------------
// rout to get form to edit data 
Route::get("/products/{id}/edit", [ProductsController::class, 'edit']);
// method that update old product data 
Route::put("/products/{id}/update", [ProductsController::class, 'update']);





// ==================== routes related to providers ====================
//route to get all providers from data base
Route::get("/providers", [ProvidersController::class, 'index']);
// route to get a provider by a specified id
Route::get("/providers/create", [ProvidersController::class, 'create']);
// route to get view that containst information about a provider by a specified id
Route::get("/providers/{id}/details", [ProvidersController::class, 'show']);
// route to save new  provider 
Route::post("/providers/store", [ProvidersController::class, 'store']);
//  url to delete information of a specified provider
Route::get("/providers/{id}/delete", [ProvidersController::class, 'destroy']);
// -------------------------- new added routes ---------------------------
//  url that returns a view with a form to edit information of a specified provider
Route::get("/providers/{id}/edit", [ProvidersController::class, 'edit']);
// method to store modified información of provider 
Route::put("/providers/{id}/update", [ProvidersController::class, 'update']);


/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */