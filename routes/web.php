<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DashboardKasubagController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DiteruskanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\UserController;

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

Route::get('/', [DashboardKasubagController::class, 'index'])->middleware(['auth', 'master']);
Route::get('/instansi', [DashboardKasubagController::class, 'instansi'])->middleware(['auth', 'master']);

// Resource instansi Controller : 
Route::resource('dashboard/instansi', InstansiController::class)->middleware(['auth', 'master']);
Route::get('dashboard/instansis/delete/{instansi}', [InstansiController::class, 'delete'])->middleware('auth');

// Resource SuratMasuk Controller :
Route::resource('dashboard/suratmasuk', SuratMasukController::class)->middleware('auth');
Route::get('dashboard/suratmasuks/delete/{suratMasuk}', [SuratMasukController::class, 'delete'])->middleware('auth');
Route::post('dashboard/suratmasuks/cetak', [SuratMasukController::class, 'cetak']);
Route::get('carisuratmasuk', [SuratMasukController::class, 'cari1']);
Route::get('carisuratmasuk/ajax', [SuratMasukController::class, 'ajax']);

// Resource SuratKeluar Controller : 
Route::resource('dashboard/suratkeluar', SuratKeluarController::class)->middleware(['auth', 'master']);
Route::get('dashboard/suratkeluars/delete/{suratkeluar}', [SuratKeluarController::class, 'delete']);


Route::get('dashboard/suratkeluars/replyLetter', [SuratKeluarController::class, 'replyLetter'])->middleware(['auth', 'master']);
Route::post('dashboard/suratkeluars/cetak', [SuratKeluarController::class, 'cetak']);

// Resource Diteruskan Controller :
Route::resource('dashboard/diteruskan', DiteruskanController::class)->middleware(['auth', 'master']);
Route::get('dashboard/diteruskan/create/{id}', [DiteruskanController::class, 'create'])->middleware(['auth', 'master']);

Route::get('dashboard/diteruskans/delete/{diteruskan}', [DiteruskanController::class, 'delete'])->middleware('auth');

// Resource Disposisi :
Route::resource('dashboard/disposisi', DisposisiController::class)->middleware('auth');
Route::get('dashboard/disposisis/create/{suratMasuk}', [DisposisiController::class, 'create']);
Route::get('dashboard/disposisis/delete/{disposisi}', [DisposisiController::class, 'delete']);
Route::get('dashboard/disposisis/{disposisi}/cetak', [DisposisiController::class, 'cetak']);

// Route Pengguna : 
Route::get('dashboard/pengguna', [PenggunaController::class, 'index'])->middleware('auth');


// Controller login : 
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('logout', [LoginController::class, 'logout']);
Route::post('login', [LoginController::class, 'authenticate']);

// Controller Akun : 
Route::resource('dashboard/user', UserController::class)->middleware(['auth', 'kasubag']);




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
Route::get('/test/11', [TestController::class, 'test11']);
Route::get('/test/12', [TestController::class, 'test12']);


Route::post('dashboard/suratmasuk2/{data}', function () {
    return 'holla';
});

Route::get('testing', function () {
    return auth()->check();
});

Route::get('carbon', function () {

});

