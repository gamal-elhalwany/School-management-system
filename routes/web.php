<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Stages\StageController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');


Route::middleware('auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->prefix(LaravelLocalization::setLocale())->group(function () {

    Route::get('/empty', function () {
        return view('empty');
    });

    Route::get('/stages', [StageController::class, 'index'])->name('stages.index');
    Route::post('/stages', [StageController::class, 'store'])->name('stages.store');
    Route::patch('/stages/{stage}', [StageController::class, 'update'])->name('stages.update');
    Route::delete('/stages/{stage}', [StageController::class, 'destroy'])->name('stages.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
