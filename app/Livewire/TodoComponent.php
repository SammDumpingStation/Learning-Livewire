<?php

namespace App\Livewire;
use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoComponent extends Component
{
    use WithPagination;
    #[Rule("required", as: 'To-do')]
    #[Rule("min:5")]
    #[Rule("max:50")]
    public $task = '';

    public function createNewTodo()  {
        $this->validate();
        Todo::create([
            'name' => $this->task
        ]);
        $this->reset('task');
    }

    public function FunctionName() {

    }

    public function hidden()  {

    }

    public function render()
    {
        return view('livewire.todo', ['todos' => Todo::orderBy('id', 'desc')->paginate(5)]);
    }
}
