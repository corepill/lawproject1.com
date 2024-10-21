<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\Public\PublicController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TeamController;
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
    Route::post('/changeStatus', [AdminController::class, 'changeStatus']);

    Route::get('/duyurular', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('/duyuru-olustur', [AnnouncementController::class, 'create'])->name('announcements.create');
    Route::post('/duyuru-olustur', [AnnouncementController::class, 'store']);
    Route::get("/duyuru-guncelle/{slug}", [AnnouncementController::class, "edit"])
        ->name("announcements.edit");
    Route::post("/duyuru-guncelle/{slug}", [AnnouncementController::class, "update"]);
    Route::delete('/duyuru-sil/{id}', [AnnouncementController::class, 'destroy'])->name('announcements.delete');

    Route::get('/ekip', [TeamController::class, 'index'])->name('team.index');
    Route::post('/ekip-olustur', [TeamController::class, 'store'])->name('team.create');
    Route::post('/ekip-guncelle/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/ekip-sil/{id}', [TeamController::class, 'destroy'])->name('team.delete');

    Route::post('/rol-olustur', [RoleController::class, "store"])->name('role.create');
    Route::delete('/rol-sil/{id}', [RoleController::class, 'destroy'])->name('role.delete');

    Route::get('/kariyer', [CareerController::class, 'index'])->name('careers.index');
    Route::get('/kariyer-ilan-olustur', [CareerController::class, 'create'])->name('careers.create');
    Route::post('/kariyer-ilan-olustur', [CareerController::class, 'store']);
    Route::get("/kariyer-guncelle/{slug}", [CareerController::class, "edit"])
        ->name("careers.edit");
    Route::post("/kariyer-guncelle/{slug}", [CareerController::class, "update"]);
    Route::delete('/kariyer-sil/{id}', [CareerController::class, 'destroy'])->name('careers.delete');

    Route::get('/hizmetler', [ServicesController::class, 'index'])->name('services.index');
    Route::get('/hizmet-olustur', [ServicesController::class, 'create'])->name('services.create');
});
