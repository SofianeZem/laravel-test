<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    ProfileController,
    PropertyController,
    Admin\OptionController
};

$idRegex = '[0-9]+';
$slugRegex = '[a-z0-9\-]+';

Route::get('/', function () {
    $properties = \App\Models\Property::latest()->paginate(16);
    return view('admin.properties.index', compact('properties'));
})->middleware(['auth', 'verified'])->name('home');

Route::get('/biens', [PropertyController::class, 'index'])->name('property.index');

Route::get('/biens/{slug}-{property}', [PropertyController::class, 'show'])
    ->name('property.show')
    ->where(['slug' => $slugRegex, 'property' => $idRegex]);

Route::post('/biens/{property}/contact', [PropertyController::class, 'contact'])
    ->name('property.contact')
    ->where('property', $idRegex);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('property', \App\Http\Controllers\Admin\PropertyController::class)->except('show');
    Route::resource('option', OptionController::class)->except('show');

    Route::get('admin', [PropertyController::class, 'index'])->name('admin');
});


require __DIR__.'/auth.php';
