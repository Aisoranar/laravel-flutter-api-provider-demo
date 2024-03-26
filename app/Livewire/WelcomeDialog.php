<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WelcomeDialog extends Component
{
    public $showWelcome = false;

    public function render()
    {
        return view('livewire.welcome-dialog');
    }

    public function toggleWelcome()
    {
        $this->showWelcome = !$this->showWelcome;
    }
}
