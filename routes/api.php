<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/id', function (Request $request) {
    return $request->user()->id;
})->middleware('auth:sanctum');
