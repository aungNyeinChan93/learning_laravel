<?php

use App\Facade\TestFacade;
use App\Facade\UserFacade;
use App\Services\Test2;
use App\Services\UserService;
use App\Test\Run;
use App\Models\User;
use App\Test\ServiceOne;
use App\Test\ServiceTwo;
use Illuminate\Config\Repository;
use Illuminate\Http\Request;
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

    $container->bind('run', function () {
        return new Run();
    });

    $runservice = $container->resolve('run');

    // dd($runservice->run($user));

    app()->bind('TestService', function () {
        return new TestService('Hello World');
    });

    $test = app()->make('TestService');
    // dd($test);

    dd(resolve('TestService'));

});

// users service container
Route::get("serviceContainer/users", function () {
    //service add
    app()->bind('allusers', function () {
        return new AllUsersService();
    });

    // $allusers = app()->make('allusers');
    $allusers = resolve('allusers');

    dd($allusers::all());
});


Route::get('serviceContainer/app', function () {
    $allUsers = app()->make(AllUsersService::class);
    $allUsers = resolve(AllUsersService::class);
    $allUsers = app()->make('allusers');
    $allUsers = resolve('allusers');

    dd($allUsers::all());
});

Route::get('serviceContainer/props', function (AllUsersService $allUsersService ) {
    dd($allUsersService::all());
});

Route::get('serviceContainer/test',function(){
    $uses = resolve(User::class);
    dd($uses->first());
});

Route::get('serviceContainer/test2',function(Run $run){
    $req = resolve(Request::class);
    dd($req->all(),$run->run('Mg Mg'));
});


Route::get('serviceContainer/test3',function(Test2 $test2){
    // dd($test2->name());
    $res = resolve('testService');
    // dd($res->getName(), $test2->name());
    dd(config('app'));
    dd(resolve('config'));
});

// http://localhost:8000/serviceContainer/facade?name=aung
Route::get('serviceContainer/facade',function(Request $request){

    $customeRquest = resolve('request'); // key
    $customeRquest2 = resolve(Request::class); //class or service

    dd($customeRquest->all(),$customeRquest2->all(),$request->all(),request()->all());  //resolve by => custome request, helper function, request facade
});

// serviceprovider
Route::get('serviceProvider',function(UserService $userService){

    $users = resolve('users');
    dd($users->every(),$userService->find(1));
});

// Facade
Route::get('facade',function(){
    dd(UserFacade::every(),TestFacade::getName());
});

// config
Route::get('config',function(){
    $config = resolve('config');
    $config2 = resolve(Repository::class);
    dd($config->get('app.name'),config('app'),$config2->get('app.env'));
});

// config/users
Route::get('config/users',function(){

    $users = config('users.allUsers.class');
    $testService = config('users.test.class');

    dd($users::all(),$testService::getName(),config('users.userModel'),config());
});





