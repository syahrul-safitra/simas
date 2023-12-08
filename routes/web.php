<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DashboardKasubagController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\DiteruskanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DisposisiController;

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

// Resource instansi Controller : 
Route::resource('dashboard/instansi', InstansiController::class);
Route::get('dashboard/instansis/delete/{instansi}', [InstansiController::class, 'delete']);

// Resource SuratMasuk Controller :
Route::resource('dashboard/suratmasuk', SuratMasukController::class);
Route::get('dashboard/suratmasuks/delete/{suratMasuk}', [SuratMasukController::class, 'delete']);

// Resource Diteruskan Controller :
Route::resource('dashboard/diteruskan', DiteruskanController::class);
Route::get('dashboard/diteruskan/create/{id}', [DiteruskanController::class, 'create']);
Route::get('dashboard/diteruskans/delete/{diteruskan}', [DiteruskanController::class, 'delete']);

Route::resource('dashboard/disposisi', DisposisiController::class);

// Route Pengguna : 
Route::get('dashboard/pengguna', [PenggunaController::class, 'index']);


// Controller login : 
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('logout', [LoginController::class, 'logout']);
Route::post('login', [LoginController::class, 'authenticate']);








// Testing Route : 
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
Route::get('/test/8', [TestController::class, 'test8']);
Route::get('/test/9', [TestController::class, 'test9']);
Route::get('/test/10', [TestController::class, 'test10']);
