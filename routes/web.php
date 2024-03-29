<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PengenalanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\SumberController;
use App\Http\Controllers\FormulaController;
use App\Http\Controllers\RasioController;
use App\Http\Controllers\DashboardController;

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
    return view('landing');
});


// Dashboard admin
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');
Route::get('/dataChart/{year}', [DashboardController::class, 'chart'])->name('dashboard-chart')->middleware(['auth']);



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


// setting user
Route::prefix('setting-user')->middleware('auth')->group(function () {
    Route::get('/edit',[UserController::class,'setting_edit'])->name('setting.edit');
    Route::any('/update',[UserController::class,'setting_update'])->name('setting.update');
});



// indikator
Route::prefix('indikator')->middleware('auth')->group(function () {
    Route::get('/get', [IndikatorController::Class, 'index'])->name('indikator.all');
    Route::get('/show', [IndikatorController::Class, 'show'])->name('indikator.show');
    Route::get('/create', [IndikatorController::class, 'create'])->name('indikator.create');
    Route::post('/post', [IndikatorController::class, 'store'])->name('indikator.post');
    Route::get('/edit/{id}',[IndikatorController::class,'edit'])->name('indikator.edit');
    Route::put('/edit/{id}',[IndikatorController::class,'update'])->name('indikator.update');
    Route::get('/delete/{id}',[IndikatorController::class,'destroy'])->name('indikator.destroy');
});

// sumber
Route::prefix('sumber')->middleware('auth')->group(function () {
    Route::get('/get', [SumberController::Class, 'index'])->name('sumber.all');
    Route::get('/show', [SumberController::Class, 'show'])->name('sumber.show');
    Route::get('/create', [SumberController::class, 'create'])->name('sumber.create');
    Route::post('/post', [SumberController::class, 'store'])->name('sumber.post');
    Route::get('/edit/{id}',[SumberController::class,'edit'])->name('sumber.edit');
    Route::put('/edit/{id}',[SumberController::class,'update'])->name('sumber.update');
    Route::get('/delete/{id}',[SumberController::class,'destroy'])->name('sumber.destroy');
});

// formula
Route::prefix('formula')->middleware('auth')->group(function () {
    Route::get('/get', [FormulaController::Class, 'index'])->name('formula.all');
    Route::get('/show', [FormulaController::Class, 'show'])->name('formula.show');
    Route::get('/create', [FormulaController::class, 'create'])->name('formula.create');
    Route::post('/post', [FormulaController::class, 'store'])->name('formula.post');
    Route::get('/edit/{id}',[FormulaController::class,'edit'])->name('formula.edit');
    Route::put('/edit/{id}',[FormulaController::class,'update'])->name('formula.update');
    Route::get('/delete/{id}',[FormulaController::class,'destroy'])->name('formula.destroy');
});

// rasio
Route::prefix('rasio')->middleware('auth')->group(function () {
    Route::get('/get', [RasioController::Class, 'index'])->name('rasio.all');
    Route::get('/formulaById/{id?}', [RasioController::Class, 'getFormulaById'])->name('rasio.formulaId');

    Route::get('/show', [RasioController::Class, 'show'])->name('rasio.show');
    Route::get('/create', [RasioController::class, 'create'])->name('rasio.create');
    Route::post('/post', [RasioController::class, 'store'])->name('rasio.post');
    Route::get('/view/{id}',[RasioController::class,'view'])->name('rasio.view');
    Route::get('/edit/{id}',[RasioController::class,'edit'])->name('rasio.edit');
    Route::put('/edit/{id}',[RasioController::class,'update'])->name('rasio.update');
    Route::get('/delete/{id}',[RasioController::class,'destroy'])->name('rasio.destroy');

    // export
    Route::get('/export',[RasioController::class,'export'])->name('rasio.export');
    Route::get('/export/{id}',[RasioController::class,'export_id'])->name('rasio.export_id');


});






