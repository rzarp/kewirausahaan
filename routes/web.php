<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PengenalanController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// import 
Route::prefix('excel')->group(function () {
    Route::get('/import-excel', [ExcelController::class, 'index'])->name('excel.import')->middleware('auth');
    
});

// pengel
Route::prefix('blok1')->group(function () {
    Route::get('/dashboard-blok1', [PengenalanController::class, 'index'])->name('pengenalan')->middleware('auth');
    Route::post('/dashboard/getkabupaten', [PengenalanController::class, 'getkabupaten'])->name('getkabupaten')->middleware('auth');
    Route::post('/dashboard/getkecamatan', [PengenalanController::class, 'getkecamatan'])->name('getkecamatan')->middleware('auth');
    Route::post('/dashboard/getdesa', [PengenalanController::class, 'getdesa'])->name('getdesa')->middleware('auth');
});

