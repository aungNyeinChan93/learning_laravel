<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{

    public $users = [];

    public $user= 'user';

    public function users()
    {
        $data = User::get()->toArray();
        $this->users[] = $data;
    }

    public function user(){
        $this->user = 'change';
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            {{-- Be like water. --}}
            <button wire:click="user">All User</button>

            {{$user}}
        </div>
        HTML;
    }
}
