<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        return view('pages.admin.dashboard')
        ->layout('layouts.admin.dashboard');
    }
}
