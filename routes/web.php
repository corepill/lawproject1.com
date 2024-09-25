<?php

use App\Http\Controllers\Public\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PublicController::class,"home"]);
Route::get('/hizmetler',[PublicController::class,"services"]);
Route::get('/bloglar',[PublicController::class,"blogs"]);
Route::get('/hakkimizda',[PublicController::class,"about"]);
Route::get('/ekibimiz',[PublicController::class,"team"]);
Route::get('/iletisim',[PublicController::class,"contact"]);
