<?php

use App\Models\User;
use App\Facade\TestFacade;

return [
    'allUsers' => [
        'name' => 'AllUsersService',
        'class' => 'App\Services\AllUsersService',
    ],
    'test' => [
        'name' => 'TestFacade',
        // 'class' => 'App\Facade\TestFacade',
        'class' => TestFacade::class,
    ],
    'userModel' => User::class,

];
