<?php

namespace App\Http\Livewire\Calendar;

use App\Models\Event;
use App\Models\Turn;
use Livewire\Component;

class Calendar extends Component
{
    public $events;
    public function render()
    {
        return view('livewire.calendar.calendar');
    }
}
