<?php

namespace App\Services;

use App\Models\User;

class AllUsersService{

    static public function all(){
        $users = User::all();
        return $users;
    }

}
