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
Route::get("/products", [ProductsController::class, 'getAll']);
//  url to get a specified product from data base
Route::get("/products/{id}", [ProductsController::class, 'getById']);
//  url to create new products
Route::post("/products", [ProductsController::class], 'store');
//  url to edit a specified product information
Route::put("/products/{id}", [ProductsController::class, 'update']);

/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */