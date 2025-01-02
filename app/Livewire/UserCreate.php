<?php

namespace App\Livewire;

use Livewire\Component;

class UserCreate extends Component


{
    public $name = 'User Create';

    public $number = 0;

    public function increase()
    {
        $this->number++;
    }
    public function decrease()
    {
        $this->number--;
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            <h3>{{$name}}</h3>
            {{-- Care about people's approval and you will be their prisoner. --}}

            <button wire:click='increase'>+</button>
            <button wire:click='decrease'>-</button>
            <h2>{{$number}}</h2>
        </div>
        HTML;
    }
}
