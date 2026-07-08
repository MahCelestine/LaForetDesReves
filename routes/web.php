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
