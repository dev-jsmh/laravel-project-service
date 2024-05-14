<?php
/**
 * Jhonatan Samuel Martinez Hernandez
 * Analyst and Software Developer
 * 2675859
 * Year 2024
 */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\controllers\ProvidersController;

// ==================== API routes for providers ====================
//route to get all providers from data base
Route::get("/providers", [ProvidersController::class, 'getAll']);
// route to get a provider by a specified id
Route::get("/providers/{id}", [ProvidersController::class, 'getById']);
// route to save new  provider 
Route::post("/providers", [ProvidersController::class, 'store']);
// route to update providers data using its id
Route::put("/providers/{id}", [ProvidersController::class, 'update']);
// route to delete a specific provider from data base by its id 
Route::delete("/providers/{id}", [ProvidersController::class, 'destroy']);


