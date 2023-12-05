<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Session\ArraySessionHandler;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DashboardKasubagController;
use App\Http\Controllers\InstansiController;
use App\Models\Instansi;

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

Route::get('/', [DashboardKasubagController::class, 'index']);
Route::get('/instansi', [DashboardKasubagController::class, 'instansi']);

Route::resource('dashboard/instansi', InstansiController::class);


// Testint Route : 
Route::get('/test', function () {
    // $data = SuratMasuk::find(3);
    // $data = $data->tanggal_diterima;
    // return view('welcome', [
    //     'data' => $data
    // ]);
    return view('welcome');
});
Route::get('/test/1', [TestController::class, 'test1']);
Route::get('/test/2', [TestController::class, 'test2']);
Route::get('/test/3', [TestController::class, 'test3']);
Route::get('/test/4', [TestController::class, 'test4']);
Route::get('/test/5', [TestController::class, 'test5']);
Route::get('/test/6', [TestController::class, 'test6']);
Route::get('/test/7', [TestController::class, 'test7']);
