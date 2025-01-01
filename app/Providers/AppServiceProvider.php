<?php

namespace App\Providers;

use App\Services\TestService;
use App\Services\AllUsersService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        app()->bind('allusers',function(){
            return new AllUsersService();
        });

        $this->app->bind('testService',function(){
            return new TestService('TestService Name');
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
