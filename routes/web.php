<?php

use App\Models\Salon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salon/{code}', function ($code) {
    $salon = Salon::where('code', $code)->firstOrFail();

    return $salon;
});
