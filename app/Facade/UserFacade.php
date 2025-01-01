<?php


namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade{
    protected static function getFacadeAccessor(){
        return 'users';
    }
}
