<?php

use App\Livewire\TodoComponent;
use App\Livewire\UploadComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', TodoComponent::class);
Route::get('/upload', UploadComponent::class);
