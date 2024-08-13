<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadComponent extends Component
{

    use WithFileUploads;
    #[Title('Upload Profile Picture')]
    public $hidden = false;

    #[Rule('required', as: 'Please upload your image first!')]
    #[Rule('image')]
    #[Rule('max:1024')]
    public $image;
    public $imageName;

    public function updatedImage()
    {
        if ($this->image) {
            $this->imageName = $this->image->getClientOriginalName();
        } else {
            $this->imageName = null;
        }
    }

    public function hideSidebar()
    {
        $this->hidden = !$this->hidden;
    }

    public function uploadImage()
    {
        $validated = $this->validateOnly('image');
        if ($this->image) {
            $validated['image'] = $this->image->storeAs('uploads', $this->image->getClientOriginalName(), 'public');
        }
        User::create($validated);
        session()->flash('success', 'Saved');
        $this->reset('image', 'imageName');
    }

    public function render()
    {
        return view('livewire.upload');
    }
}
