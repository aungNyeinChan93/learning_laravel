<?php

use App\Test\ServiceOne;
use App\Test\ServiceTwo;
use App\Container\MyContainer;
use Illuminate\Support\Facades\Route;
use Laragear\WebAuthn\Http\Routes as WebAuthnRoutes;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;


require_once __DIR__ . '/test.php';


Route::get('/', function () {
    return view('welcome');
});

Route::get('test',function(){
    return view('test.index');
});


// web.php
// Route::view('welcome');

// WebAuthn Routes
WebAuthnRoutes::register()->withoutMiddleware(VerifyCsrfToken::class);





