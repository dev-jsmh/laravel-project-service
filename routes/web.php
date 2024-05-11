<?php

use App\Http\Controllers\ProvidersController;
use Illuminate\Support\Facades\Route;


Route::get("/providers", [ProvidersController::class, 'getAll']);
