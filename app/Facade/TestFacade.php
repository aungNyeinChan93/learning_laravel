<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class TestFacade extends Facade{
    static protected function getFacadeAccessor(){
        return 'test';
    }
}
