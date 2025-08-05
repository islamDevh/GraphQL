<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
Route::get('/', function () {
    // return View::first(['index', 'home.index']);

    // return View::renderWhen(1 + 1 === 2, 'index');

    // return View::exists(['index', 'home']);

    if(View::exists('index')) {
        return 'the index blade is exists.';
    }
});
