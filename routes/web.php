<?php

use App\Http\Controllers\PuppyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
use App\Http\Controllers\LitterController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\ContactController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('front.index');
});

Route::get('/nos-races', function () {
    return view('front.nos-races');
});

Route::get('/nos-races/{slug}', [BreedController::class, 'show'])->name('front.breeds.show');

Route::get('/nos-races/{slug}/nos-reproducteurs', [BreedController::class, 'showBreedDogs'])->name('front.breeds.dogs');

Route::get('/nos-races/{slug}/nos-reproducteurs/{dogSlug}', [BreedController::class, 'showDogDetails'])->name('front.breeds.dog-details');

Route::get('/nos-races/{slug}/nos-chiots', [BreedController::class, 'showBreedPuppies'])->name('front.breeds.puppies');

Route::get('/nos-races/{slug}/nos-chiots/{puppySlug}', [BreedController::class, 'showPuppyDetails'])->name('front.breeds.puppy-details');

Route::get('/le-guide-de-l-adoption', function () {
    return view('front.le-guide-de-l-adoption');
});

Route::get('/le-coin-conseil', [ContentController::class, 'indexFront'])->name('front.content.index');

Route::get('/le-coin-conseil/{content:slug}', [ContentController::class, 'show'])->name('front.content.content-details');

Route::get('/nous-contacter', [ContactController::class, 'create'])->name('front.contact');

Route::post('/nous-contacter', [ContactController::class, 'submit'])->name('front.contact.submit');

Route::get('/mentions-legales', function() {
    return view('front.mentions-legales');
});

Route::get('/politique-de-confidentialite', function() {
    return view('front.politique-confidentialite');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/back-chien', [DogController::class, 'indexBack'])->name('back.back-chien');

    Route::get('/back-chien/create', [DogController::class, 'create'])->name('back.back-chien-create');
    Route::post('/back-chien/store', [DogController::class, 'store'])->name('back.back-chien-store');
    Route::get('back-chien/{dog}/edit', [DogController::class, 'edit'])->name('back.back-chien-edit');
    Route::put('back-chien/{dog}', [DogController::class, 'update'])->name('back.back-chien-update');
    Route::delete('back-chien/{dog}', [DogController::class, 'destroy'])->name('back.back-chien-destroy');

    Route::get('/back-chiot', [PuppyController::class, 'indexBack'])->name('back.back-chiot');

    Route::get('/back-chiot/create/{litter_id?}', [PuppyController::class, 'create'])->name('back.back-chiot-create');
    Route::post('/back-chiot/store', [PuppyController::class, 'store'])->name('back.back-chiot-store');
    Route::get('back-chiot/{puppy}/edit', [PuppyController::class, 'edit'])->name('back.back-chiot-edit');
    Route::put('back-chiot/{puppy}', [PuppyController::class, 'update'])->name('back.back-chiot-update');
    Route::delete('back-chiot/{puppy}', [PuppyController::class, 'destroy'])->name('back.back-chiot-destroy');

    Route::get('/back-litter/create', [LitterController::class, 'create'])->name('back.back-litter-create');
    Route::post('/back-litter/store', [LitterController::class, 'store'])->name('back.back-litter-store');
    Route::get('back-litter/{litter}/edit', [LitterController::class, 'edit'])->name('back.back-litter-edit');
    Route::put('back-litter/{litter}', [LitterController::class, 'update'])->name('back.back-litter-update');
    Route::delete('back-litter/{litter}', [LitterController::class, 'destroy'])->name('back.back-litter-destroy');

    Route::get('/back-content', [ContentController::class, 'indexBack'])->name('back.back-content');

    Route::get('/back-content/create', [ContentController::class, 'create'])->name('back.back-content-create');
    Route::post('/back-content/store', [ContentController::class, 'store'])->name('back.back-content-store');
    Route::get('back-content/{content}/edit', [ContentController::class, 'edit'])->name('back.back-content-edit');
    Route::put('back-content/{content}', [ContentController::class, 'update'])->name('back.back-content-update');
    Route::delete('back-content/{content}', [ContentController::class, 'destroy'])->name('back.back-content-destroy');

});

