<?php

use App\Http\Controllers\PuppyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
use App\Http\Controllers\LitterController;
use App\Http\Controllers\ContentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('front.index');
});

Route::get('/nos-races', function () {
    return view('front.nos-races');
});

Route::get('/le-guide-de-l-adoption', function () {
    return view('front.le-guide-de-l-adoption');
});

Route::get('/nous-contacter', function () {
    return view('front.contact');
});

Route::get('/nos-races/samoyede', function () {
    return view('front.samoyede');
});

Route::get('/nos-races/berger-americain', function () {
    return view('front.berger-americain');
});

Route::get('/nos-races/staffordshire-bull-terrier', function () {
    return view('front.staffie');
});

Route::get('/nos-races/samoyede/nos-reproducteurs', function () {
    /////voir pour faire en sorte que le nom de la race change dynamiquement comme 
    // le contenue de nos reprodcuteur avec un contexte comme cca mais avec la race 
    // donc l'index doit suivre
    return view('front.nos-reproducteurs');
});

Route::get('/nos-races/samoyede/nos-chiots', function () {
    return view('front.nos-chiots');
});

Route::get('/le-coin-conseil/article', function () {
    return view('front.content');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/back-chien', [DogController::class, 'indexBack'])->name('back.back-chien');

    Route::get('/back-chien/create', [DogController::class, 'create'])->name('back.back-chien-create');
    Route::post('/back-chien/store', [DogController::class, 'store'])->name('back.back-chien-store');
    Route::get('back-chien/{dog}/edit', [DogController::class, 'edit'])->name('back.back-chien-edit');
    Route::post('back-chien/{dog}', [DogController::class, 'update'])->name('back.back-chien-update');
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