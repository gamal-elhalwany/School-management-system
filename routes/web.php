<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Stages\StageController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Classrooms\ClassroomController;
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


Route::middleware(['auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->prefix(LaravelLocalization::setLocale())->group(function () {

    // Livewire build-in routes. Added this route to global fix, because the livewire couldn't skip the localization. So when use Localiztion put this Livewire method. 
    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle)
            ->withoutMiddleware(['localizationRedirect', 'localeViewPath']);
    });

    Route::get('/livewire_counter', function () {
        return view('livewire_counter');
    });

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/stages', [StageController::class, 'index'])->name('stages.index');
    Route::post('/stages', [StageController::class, 'store'])->name('stages.store');
    Route::patch('/stages/{stage}', [StageController::class, 'update'])->name('stages.update');
    Route::delete('/stages/{stage}', [StageController::class, 'destroy'])->name('stages.destroy');

    // Classrooms Routes.
    Route::resource('classrooms', ClassroomController::class);
    Route::post('classrooms/delete_classrooms/all', [ClassroomController::class, 'delete_all_classrooms'])->name('delete_all.classrooms');

    // Sections Routes.
    Route::resource('sections', SectionController::class);
    Route::get('classes/{class}', [SectionController::class, 'getClasses'])->name('get.classes');

    // Livewire Routes.
    Route::view('add-parent', 'livewire.parent_form');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
