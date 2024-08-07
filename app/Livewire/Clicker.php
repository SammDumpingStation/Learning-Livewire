<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithPagination;

    #[Rule('required')]
    public $name = '';

    #[Rule('required')]
    public $email = '';

    #[Rule('required')]
    public $password = '';

    public function createNewUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        $this->reset(['name', 'email', 'password']);
    }
    public function render()
    {
        return view('livewire.clicker', [
            'users' => User::orderBy('id', 'desc')->paginate(5),
        ]);
    }
}
