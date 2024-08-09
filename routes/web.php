<?php

use App\Livewire\TodoComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', TodoComponent::class);
