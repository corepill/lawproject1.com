<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Public\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, "home"]);
Route::get('/hizmetler', [PublicController::class, "services"]);
Route::get('/hizmetler/{slug}', [PublicController::class, 'serviceDetail']);
Route::get('/bloglar', [PublicController::class, "blogs"]);
Route::get('/bloglar/{slug}', [PublicController::class, 'blogDetail']);
Route::get('/hakkimizda', [PublicController::class, "about"]);
Route::get('/ekibimiz', [PublicController::class, "team"]);
Route::get('/kariyer', [PublicController::class, "career"]);
Route::get('/kariyer/{slug}', [PublicController::class, "careerDetail"]);
Route::get('/duyurular', [PublicController::class, "announcements"]);
Route::get('/duyurular/{slug}', [PublicController::class, "announcementDetail"]);
Route::get('/iletisim', [PublicController::class, "contact"]);

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, "dashboard"]);


    Route::get('/duyurular', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('/duyuru-olustur', [AnnouncementController::class, 'create'])->name('announcements.create');
    Route::post('/duyuru-olustur', [AnnouncementController::class, 'store']);
    Route::get("/duyuru-guncelle/{slug}", [AnnouncementController::class, "edit"])
        ->name("announcements.edit");

    Route::post("/duyuru-guncelle/{slug}", [AnnouncementController::class, "update"]);
});
