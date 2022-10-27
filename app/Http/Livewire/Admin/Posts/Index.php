<?php

namespace App\Http\Livewire\Admin\Posts;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.posts.index')->extends('layouts.master')->section('content');
    }
}
