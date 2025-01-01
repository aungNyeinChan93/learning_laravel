<?php

namespace App\Services;

use App\Models\User;

class UserService{
    public function name(){
        return "UserService";
    }

    public function every(){
        return User::all();
    }

    public function find($id){
        return User::find($id);
    }
}
