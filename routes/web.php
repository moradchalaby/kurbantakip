<?php

use App\Http\Controllers\Kurban\BuyukbasController;
use App\Http\Controllers\Kurban\DefaultController;
use App\Http\Controllers\Kurban\KameraController;
use App\Http\Controllers\Kurban\KucukbasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::namespace('Kurban')->group(function () {
    Route::get('/', [DefaultController::class,'index'])->name('dashboard');
    Route::get('file-import-export', [DefaultController::class, 'fileImportExport'])->name('file.import');
    Route::post('file-import', [DefaultController::class, 'fileImport'])->name('file-import');
    Route::prefix('buyukbas')->group(function () {
        //BLOG
        // Route::post('/buyukbas/sortable', [BlogController::class, 'sortable')->name('blog.Sortable');
        Route::get('/', [BuyukbasController::class, 'index'])->name('buyukbas.index');
        Route::get('/tamamlanan', [BuyukbasController::class, 'tamamlanan'])->name('buyukbas.tamamlanan');

        Route::get('/video', [BuyukbasController::class, 'video'])->name('buyukbas.video');
        Route::get('/arama', [BuyukbasController::class, 'arama'])->name('buyukbas.arama');
        Route::get('/kesilmemis', [BuyukbasController::class, 'kesilmemis'])->name('buyukbas.kesilmemis');
        Route::get('/rapor', [BuyukbasController::class, 'rapor'])->name('buyukbas.rapor');
        Route::get('/detail/{id}', [BuyukbasController::class, 'detail'])->name('buyukbas.detail');

        Route::post('/update', [BuyukbasController::class, 'update'])->name('buyukbas.update');
        Route::post('/', [BuyukbasController::class, 'index'])->name('buyukbas.reload');
        Route::post('/edit', [BuyukbasController::class, 'edit']);
        Route::post('/store', [BuyukbasController::class, 'store']);
        Route::post('/kesilmedrm', [BuyukbasController::class, 'kesilmedrm']);
        Route::post('/videodrm', [BuyukbasController::class, 'videodrm']);
        Route::post('/aramadrm', [BuyukbasController::class, 'aramadrm']);
        Route::post('/vekaletdrm', [BuyukbasController::class, 'vekaletdrm']);
        Route::post('/info', [BuyukbasController::class, 'info']);

        //PAGE
        //Route::post('/page/sortable', [PageController::class, 'sortable'])->name('page.Sortable');
        //Route::resource('page', [PageController');
    });
    Route::prefix('kucukbas')->group(function () {
        //BLOG
        // Route::post('/Kucukbas/sortable', [BlogController::class, 'sortable')->name('blog.Sortable');
        Route::get('/', [KucukbasController::class, 'index'])->name('kucukbas.index');
        Route::get('/tamamlanan', [KucukbasController::class, 'tamamlanan'])->name('kucukbas.tamamlanan');
        Route::get('/video', [KucukbasController::class, 'video'])->name('kucukbas.video');
        Route::get('/arama', [KucukbasController::class, 'arama'])->name('kucukbas.arama');
        Route::get('/kesilmemis', [KucukbasController::class, 'kesilmemis'])->name('kucukbas.kesilmemis');
        Route::get('/rapor', [KucukbasController::class, 'rapor'])->name('kucukbas.rapor');
        Route::get('/detail/{id}', [KucukbasController::class, 'detail'])->name('kucukbas.detail');

        Route::post('/update', [KucukbasController::class, 'update'])->name('kucukbas.update');
        Route::post('/', [KucukbasController::class, 'index'])->name('kucukbas.reload');
        Route::post('/edit', [KucukbasController::class, 'edit']);
        Route::post('/store', [KucukbasController::class, 'store']);
        Route::post('/kesilmedrm', [KucukbasController::class, 'kesilmedrm']);
        Route::post('/videodrm', [KucukbasController::class, 'videodrm']);
        Route::post('/aramadrm', [KucukbasController::class, 'aramadrm']);
        Route::post('/vekaletdrm', [KucukbasController::class, 'vekaletdrm']);
        Route::post('/info', [KucukbasController::class, 'info']);

        //PAGE
        //Route::post('/page/sortable', [PageController::class, 'sortable')->name('page.Sortable');
        //Route::resource('page', [PageController');
    });
    Route::prefix('kamera')->group(function () {
        //BLOG
        // Route::post('/buyukbas/sortable', [BlogController::class, 'sortable')->name('blog.Sortable');

        Route::get('/buyukbas', [KameraController::class, 'buyukbas'])->name('kamera.buyukbas');
        Route::post('/buyukbasSave', [KameraController::class, 'buyukbasSave'])->name('kamera.buyukbas.save');
        Route::post('/store', [BuyukbasController::class, 'store']);
        Route::post('/kesilmedrm', [BuyukbasController::class, 'kesilmedrm']);
        Route::post('/videodrm', [BuyukbasController::class, 'videodrm']);
        Route::post('/aramadrm', [BuyukbasController::class, 'aramadrm']);
        Route::post('/vekaletdrm', [BuyukbasController::class, 'vekaletdrm']);
        Route::post('/info', [BuyukbasController::class, 'info']);

        //PAGE
        //Route::post('/page/sortable', [PageController::class, 'sortable')->name('page.Sortable');
        //Route::resource('page', [PageController');
    });
});
