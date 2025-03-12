<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function ()
    {

        Route::get('/dashboard', function () {
            alert('This is a test message', 'Thanks!');

//            toastr('This is a test message', 'Thanks!')
//                ->error()
//                ->topLeft();

            notify('This is a test message', 'Thanks!')
                ->warning()
                ->action('Okay')
                ->cancel('Cancel')
                ->topLeft()
                ->flash();


//            modal('This is a test message', 'Thanks!')
//                ->action('Okay', '/')
//                ->cancel('Cancel', '/');

            return view('dashboard');
        })->name('dashboard');
    });
