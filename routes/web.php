<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;

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

    Route::get('/back-chien', [DogController::class, 'index'])->name('back.back-chien');

    Route::get('/back-chien/create', [DogController::class, 'create'])->name('back.back-chien-create');

    Route::post('/back-chien/store', [DogController::class, 'store'])->name('back.back-chien-store');

    Route::get('back-chien/update', function () {
        return view('back.back-chien-update');
    });

    Route::get('/back-chiot', function () {
        return view('back.back-chiot');
    });
    Route::get('/back-chiot/create', function () {
        return view('back.back-chiot-create');
    });

    Route::get('back-chiot/update', function () {
        return view('back.back-chiot-update');
    });


    Route::get('/back-litter/create', function () {
        return view('back.back-litter-create');
    });

    Route::get('back-litter/update', function () {
        return view('back.back-litter-update');
    });


    Route::get('/back-content', function () {
        return view('back.back-content');
    });

    Route::get('/back-content/create', function () {
        return view('back.back-content-create');
    });

    Route::get('back-content/update', function () {
        return view('back.back-content-update');
    });

});
