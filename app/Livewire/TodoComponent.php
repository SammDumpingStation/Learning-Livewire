<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class TodoComponent extends Component
{
    use WithPagination;

    #[Title('Todos')]
    public $hidden = false;

    #[Rule("required", as :'To-do')]
    #[Rule("min:5")]
    #[Rule("max:50")]
    public $task = '';

    public $search = '';

    #[Rule("required", as :'To-do')]
    #[Rule("min:5")]
    #[Rule("max:50")]
    public $editName = '';

    public $editId = '';

    public function createNewTodo()
    {
        $this->validateOnly('task');
        $todoString = ucwords(strtolower($this->task));

        Todo::create([
            'name' => $todoString,
        ]);
        $this->reset('task');
        session()->flash('success', 'Saved');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
    }

    public function toggle(Todo $todo)
    {
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function edit(Todo $todo)
    {
        $this->resetValidation();
        $this->editId = $todo->id;
        $this->editName = $todo->name;
    }

    public function resetUpdate()
    {
        $this->reset('editName', 'editId');
    }

    public function updateTodo(Todo $todo)
    {
        $this->validateOnly('editName');
        $todo->update([
            'name' => $this->editName
        ]);
        $this->resetUpdate();
    }

    public function hideSidebar()
    {
        $this->hidden = !$this->hidden;
    }

    public function render()
    {
        date_default_timezone_set('Asia/Manila');
        return view('livewire.todo', ['todos' => Todo::orderBy('id', 'desc')->where('name', 'ILIKE', "%{$this->search}%")->paginate(5)]);
    }
}
