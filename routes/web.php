<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    abort(403, 'This action is unauthorized.');
});
