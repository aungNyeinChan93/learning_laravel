<?php

namespace App\Services;

class TestService{
    protected $name;

    public function getName(){
        return $this->name;
    }

    public function __construct($name){
        $this->name = $name;
    }

}
