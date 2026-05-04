<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\SubCategoryController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('subcategories', SubCategoryController::class);