<?php

use App\Http\Controllers\Public\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PublicController::class,"home"]);
Route::get('/hizmetler',[PublicController::class,"services"]);
