<?php

use Illuminate\Support\Facades\Route;

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
