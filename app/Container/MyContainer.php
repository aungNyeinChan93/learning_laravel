<?php

namespace App\Container;

class MyContainer
{
    protected $allServices = [];

    public function bind($name,$service){
        $this->allServices[$name] = $service;
    }

    public function resolve($name){
        return call_user_func($this->allServices[$name]);
    }
}
