<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartcController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback(function() {
        return view('pages/utility/404');
    });

    Route::get('/data_input', [DashboardController::class, 'data_input'])->name('data_input');

    Route::get('/partc_list', [PartcController::class, 'partc_list'])->name('partc_list');
    Route::post('/partc_input', [PartcController::class, 'partc_input'])->name('partc_input');
    Route::get('/partc_show/{id}', [PartcController::class, 'partc_show'])->name('partc_show');
    Route::get('/partc_edit/{id}', [PartcController::class, 'partc_edit'])->name('partc_edit');
    Route::post('/partc_update/{id}', [PartcController::class, 'partc_update'])->name('partc_update');
    Route::get('/partc_delete/{id}', [PartcController::class, 'partc_delete'])->name('partc_delete');



    Route::get('/partc_ktp/{ktp}', [PartcController::class, 'partc_ktp'])->name('partc_ktp');
    Route::get('/partc_ijazah/{ijazah}', [PartcController::class, 'partc_ijazah'])->name('partc_ijazah');
    Route::get('/partc_skb/{skb}', [PartcController::class, 'partc_skb'])->name('partc_skb');
    Route::get('/partc_foto4x6/{foto4x6}', [PartcController::class, 'partc_foto4x6'])->name('partc_foto4x6');
    Route::get('/partc_foto2x3/{foto2x3}', [PartcController::class, 'partc_foto2x3'])->name('partc_foto2x3');


    Route::post('/batch_create', [DashboardController::class, 'batch_input'])->name('batch_input');
    Route::post('/itn_create', [DashboardController::class, 'itn_input'])->name('itn_input');
    Route::get('/batch_hapus/{id}', [DashboardController::class, 'batch_hapus'])->name('batch_hapus');
    Route::get('/itn_hapus/{id}', [DashboardController::class, 'itn_hapus'])->name('itn_hapus');


});
