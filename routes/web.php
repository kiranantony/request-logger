<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogRequestResponseTime;

Route::get('/', function () {
    return view('welcome');
})->middleware(LogRequestResponseTime::class);
;
