<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->route('dashboard.index');
})->name('dashboard');

// Rutas que requieren que el usuario este logeado
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard.index');
    #Toma de fotografía
    Route::get('/photo', function () {
        return view('photos.index');
    })->name('photo');
    #Impresión de tarjetas individual
    Route::get('/cards/individual', function () {
        return view('cards.individual.index');
    })->name('cards.individual');
    #Impresión de tarjetas multiple
    Route::get('/cards/multiple', function () {
        return view('cards.multiple.index');
    })->name('cards.multiple');
    #Compulsa
    Route::get('/compulsa', function () {
        return view('compulsa.index');
    })->name('compulsa');
    #Mapa
    Route::get('/map', function () {
        return view('map.index');
    })->name('map');
    #Galery (Index)
    Route::get('/gallery', function () {
        return view('gallery.index');
    })->name('gallery');
    #Galería de fotos
    Route::get('/gallery/photo', function () {
        return view('gallery.photo.index');
    })->name('gallery.photo');
    #Subir multiple fotos
    Route::get('/gallery/upload/multiple/photos', function () {
        return view('gallery.multiple.index');
    })->name('gallery.multiple');
    #Card Printing Controller
    Route::resource('cards', 'App\Http\Controllers\CardPrintingController');
    Route::resource('configs', 'App\Http\Controllers\ConfigController');
    #Ruta para generar el pdf de manera individual
    Route::get('/print/cards/individual', [App\Http\Controllers\CardPrintingController::class, 'printIndividualCard'])->name('print.cards.individual');
    Route::get('/print/cards/multiple', [App\Http\Controllers\CardPrintingController::class, 'printMultipleCard'])->name('print.cards.multiple');
    #Ruta para generar el pdf de la consulta
    Route::get('print/compulsa', [App\Http\Controllers\CompulsaController::class, 'printCompulsa'])->name('print.compulsa');
    Route::get('/select/tianguis', [App\Http\Controllers\CardPrintingController::class, 'getTianguis'])->name('select.tianguis');
    Route::post('/update/site/settings', [App\Http\Controllers\ConfigController::class, 'updateSiteSettings'])->name('configs.update.site_settings');
    Route::post('/user/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
    Route::post('/photo/data', [App\Http\Controllers\PhotoUploadController::class, 'receivealldata'])->name('photo.data');
    Route::post('/photo/upload', [App\Http\Controllers\PhotoUploadController::class, 'add_employee_photo'])->name('photo.upload');
    Route::post('/update/site/settings', [App\Http\Controllers\ConfigController::class, 'updateSiteSettings'])->name('configs.update.site_settings');

});
