<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function ()
    {
//        field('first_name', 'First name is required')
//            ->timeout(1000)
//            ->error();
//
//        field('last_name', 'Last name is required')
//            ->timeout(1000)
//            ->error();

        Route::get('/dashboard', function () {
//            field('first_name', 'This is a test message')
//                ->id('first_name')
//                ->error();
//
//            alert('Thanks for subscribing', 'Thanks you!')
//                ->timeout(10000)
//                ->success();

//            alert('Thanks 999 subscribing', 'Killers!')
//                ->success();
//
//            toastr('This is a test message', 'Thanks!')
//                ->success()
//                ->timeout(10000)
//                ->topRight();
//
//            toastr('ok', 'Thanks!')
//                ->success()
//                ->timeout(10000)
//                ->bottomRight();
//
            notify('This is a test message', 'Thanks!')
                ->warning()
                ->action('Okay')
                ->cancel('Cancel')
                ->timeout(10000);

//
            modal('This is a test message', 'Thanks!')
                ->action('Okay', '/')
                ->cancel('Cancel', '/');

            modal('What is your name', 'Hallo!')
                ->action('OK')
                ->cancel('X')
                ->timeout(10000)
                ->button('Y', 'Y', null, ['class' => 'action-button']);

//            notify('This is a', 'Thanks!')
//                ->id('stage')
//                ->warning()
//                ->action('Ok', '/')
//                ->cancel('x')
//                ->button('y', 'Y', null, ['class' => 'action-button'])
//                ->timeout(5000);
//
//            notify('Lets get started', 'Thanks!')
//                ->id('test')
//                ->warning()
//                ->action('Ok')
//                ->cancel('x')
//                ->timeout(1000000);

            return view('dashboard');
        })->name('dashboard');
    });
