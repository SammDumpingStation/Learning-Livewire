<?php

namespace App\Livewire;

use Livewire\Component;

class HellowWorld extends Component
{
    public $count = 0;
    public $total = 0;

    public function increment()
    {
        $this->total += 400;
        $this->count++;
    }

    public function decrement()
    {
        $this->total -= 400;
        $this->count--;
    }

    public function render()
    {
        return view('livewire.hellow-world');
    }
}
