<?php


namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade{
    protected static function getFacadeAccessor(){

        return 'users';  // key or class name User::class

        /**
         * if service has arguments or dependencies, it should be used for implicit binding ("user", new UserService(props))
         * orNot use to explicit binding ( UserService::class )
         */
    }
}
