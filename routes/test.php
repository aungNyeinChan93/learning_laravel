<?php

use App\Test\Run;
use App\Test\ServiceOne;
use App\Test\ServiceTwo;
use App\Services\TestService;
use App\Container\MyContainer;
use App\Services\AllUsersService;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Route;


// service container
Route::get('serviceContainer', function () {

    $user = 'mgmg';

    $container = new MyContainer();

    $container->bind('s1', function () {
        return new ServiceOne();
    });

    $container->bind('s2', function ($container) {
        return new ServiceTwo();
    });

    $s1 = $container->resolve('s1');

    //

    $container->bind('run',function(){
        return new Run();
    });

    $runservice = $container->resolve('run');

    // dd($runservice->run($user));

    app()->bind('TestService',function(){
        return new TestService('Hello World');
    });

    $test = app()->make('TestService');
    // dd($test);

    dd(resolve('TestService'));

});

// users service container
Route::get("serviceContainer/users",function(){
    //service add
    app()->bind('allusers',function(){
        return new AllUsersService();
    });

    // $allusers = app()->make('allusers');
    $allusers = resolve('allusers');

    dd($allusers::all());
});
