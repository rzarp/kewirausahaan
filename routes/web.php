<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PengenalanController;
use App\Http\Controllers\UserController;

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

// pengenalan
Route::prefix('blok1')->middleware('auth')->group(function () {
    Route::get('/dashboard-blok1', [PengenalanController::class, 'index'])->name('pengenalan');
    Route::post('/dashboard-blok1-store', [PengenalanController::class,'store'])->name('pengenalan.store');
    Route::post('/dashboard/getkabupaten', [PengenalanController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('/dashboard/getkecamatan', [PengenalanController::class, 'getkecamatan'])->name('getkecamatan');
    Route::post('/dashboard/getdesa', [PengenalanController::class, 'getdesa'])->name('getdesa');
    Route::get('/dashboard/edit/{id}',[PengenalanController::class,'edit'])->name('pengenalan.edit');
    Route::put('/dashboard/update/{id}',[PengenalanController::class,'update'])->name('pengenalan.update');
    Route::delete('/dashboard/delete/{id}',[PengenalanController::class,'destroy'])->name('pengenalan.destroy');
});

// crud user
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/user-insert', [UserController::class, 'index'])->name('user.insert');
    Route::post('/user-post', [UserController::class, 'store'])->name('user.post');
    Route::any("/update/toggle/{id}", [UserController::class, "changeUserStatus"]);
    Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::put('/user/update/{id}',[UserController::class,'update'])->name('user.update');
    Route::get('/user/delete/{id}',[UserController::class,'destroy'])->name('user.destroy');

    // restore
    Route::get('/trash/user', [UserController::class, 'trash'])->name('trash.user');
    Route::get('/restore/user/{id?}', [UserController::class, 'restore'])->name('restore.user');
    Route::get('/delete/user/{id?}', [UserController::class, 'delete'])->name('delete.user');
});

