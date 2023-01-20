<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItnsController;
use App\Http\Controllers\BatchsController;
use App\Http\Controllers\PartcController;
use App\Http\Controllers\PartcrController;
use App\Http\Controllers\PartcpController;

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
    Route::fallback(function () {
        return view('pages/utility/404');
    });

    Route::get('/data_input', [DashboardController::class, 'data_input'])->name('data_input');

    Route::get('/partc_list', [PartcController::class, 'partc_list'])->name('partc_list');
    Route::post('/partc_input', [PartcController::class, 'partc_input'])->name('partc_input');
    Route::get('/partc_show/{id}', [PartcController::class, 'partc_show'])->name('partc_show');
    Route::get('/partc_edit/{id}', [PartcController::class, 'partc_edit'])->name('partc_edit');
    Route::post('/partc_update/{id}', [PartcController::class, 'partc_update'])->name('partc_update');
    Route::get('/partc_delete/{id}', [PartcController::class, 'partc_delete'])->name('partc_delete');
    Route::get('/partc_print/{id}', [PartcController::class, 'partc_print'])->name('partc_print');

    Route::get('/partcr_list', [PartcrController::class, 'partcr_list'])->name('partcr_list');
    Route::post('/partcr_input', [PartcrController::class, 'partcr_input'])->name('partcr_input');
    Route::get('/partcr_show/{id}', [PartcrController::class, 'partcr_show'])->name('partcr_show');
    Route::get('/partcr_edit/{id}', [PartcrController::class, 'partcr_edit'])->name('partcr_edit');
    Route::post('/partcr_update/{id}', [PartcrController::class, 'partcr_update'])->name('partcr_update');
    Route::get('/partcr_delete/{id}', [PartcrController::class, 'partcr_delete'])->name('partcr_delete');
    Route::get('/partcr_print/{id}', [PartcrController::class, 'partcr_print'])->name('partcr_print');

    Route::get('/partcp_list', [PartcpController::class, 'partcp_list'])->name('partcp_list');
    Route::post('/partcp_input', [PartcpController::class, 'partcp_input'])->name('partcp_input');
    Route::get('/partcp_show/{id}', [PartcpController::class, 'partcp_show'])->name('partcp_show');
    Route::get('/partcp_edit/{id}', [PartcpController::class, 'partcp_edit'])->name('partcp_edit');
    Route::post('/partcp_update/{id}', [PartcpController::class, 'partcp_update'])->name('partcp_update');
    Route::get('/partcp_delete/{id}', [PartcpController::class, 'partcp_delete'])->name('partcp_delete');
    Route::get('/partcp_print/{id}', [PartcpController::class, 'partcp_print'])->name('partcp_print');


    Route::get('/partc_ktp/{ktp}', [PartcController::class, 'partc_ktp'])->name('partc_ktp');
    Route::get('/partc_ijazah/{ijazah}', [PartcController::class, 'partc_ijazah'])->name('partc_ijazah');
    Route::get('/partc_skb/{skb}', [PartcController::class, 'partc_skb'])->name('partc_skb');
    Route::get('/partc_foto4x6/{foto4x6}', [PartcController::class, 'partc_foto4x6'])->name('partc_foto4x6');
    Route::get('/partc_foto2x3/{foto2x3}', [PartcController::class, 'partc_foto2x3'])->name('partc_foto2x3');
    Route::get('/partc_serti/{serti}', [PartcController::class, 'partc_serti'])->name('partc_serti');

    Route::get('/partcr_ktp/{ktp}', [PartcrController::class, 'partcr_ktp'])->name('partcr_ktp');
    Route::get('/partcr_ijazah/{ijazah}', [PartcrController::class, 'partcr_ijazah'])->name('partcr_ijazah');
    Route::get('/partcr_skb/{skb}', [PartcrController::class, 'partcr_skb'])->name('partcr_skb');
    Route::get('/partcr_foto4x6/{foto4x6}', [PartcrController::class, 'partcr_foto4x6'])->name('partcr_foto4x6');
    Route::get('/partcr_foto2x3/{foto2x3}', [PartcrController::class, 'partcr_foto2x3'])->name('partcr_foto2x3');
    Route::get('/partcr_serti/{serti}', [PartcrController::class, 'partcr_serti'])->name('partcr_serti');
    Route::get('/partcr_skp/{skp}', [PartcrController::class, 'partcr_skp'])->name('partcr_skp');
    Route::get('/partcr_lisen/{lisen}', [PartcrController::class, 'partcr_lisen'])->name('partcr_lisen');
    Route::get('/partcr_ak3/{ak3}', [PartcrController::class, 'partcr_ak3'])->name('partcr_ak3');

    Route::get('/partcp_ktp/{ktp}', [PartcpController::class, 'partcp_ktp'])->name('partcp_ktp');
    Route::get('/partcp_ijazah/{ijazah}', [PartcpController::class, 'partcp_ijazah'])->name('partcp_ijazah');
    Route::get('/partcp_skb/{skb}', [PartcpController::class, 'partcp_skb'])->name('partcp_skb');
    Route::get('/partcp_foto4x6/{foto4x6}', [PartcpController::class, 'partcp_foto4x6'])->name('partcp_foto4x6');
    Route::get('/partcp_foto2x3/{foto2x3}', [PartcpController::class, 'partcp_foto2x3'])->name('partcp_foto2x3');
    Route::get('/partcp_serti/{serti}', [PartcpController::class, 'partcp_serti'])->name('partcp_serti');

    Route::get('/batch_list', [BatchsController::class, 'batch_list'])->name('batch_list');
    Route::post('/batch_create', [DashboardController::class, 'batch_input'])->name('batch_input');
    Route::get('/batch_hapus/{id}', [DashboardController::class, 'batch_hapus'])->name('batch_hapus');
    Route::get('/batch_show/{id}', [BatchsController::class, 'batch_show'])->name('batch_show');
    Route::get('/pbatch_show/{id}', [BatchsController::class, 'pbatch_show'])->name('pbatch_show');

    Route::get('/itn_list', [ItnsController::class, 'itn_list'])->name('itn_list');
    Route::post('/itn_create', [DashboardController::class, 'itn_input'])->name('itn_input');
    Route::get('/itn_hapus/{id}', [DashboardController::class, 'itn_hapus'])->name('itn_hapus');
    Route::get('/itn_show/{id}', [ItnsController::class, 'itn_show'])->name('itn_show');
    Route::post('/addr_input/{id}', [ItnsController::class, 'addr_input'])->name('addr_input');
    Route::get('/addr_hapus/{addr_id}', [ItnsController::class, 'addr_hapus'])->name('addr_hapus');

    Route::post('/pbatch_create', [DashboardController::class, 'pbatch_input'])->name('pbatch_input');
    Route::get('/pbatch_hapus/{id}', [DashboardController::class, 'pbatch_hapus'])->name('pbatch_hapus');
});
