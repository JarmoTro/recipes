<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AuthController;

Route::get('/', [RecipeController::class, "getRecipesPage"]);

Route::get('/login', [AuthController::class, "getLoginPage"]);

Route::get('/logout', [AuthController::class, "logout"]);

Route::post('/login', [AuthController::class, "login"]);