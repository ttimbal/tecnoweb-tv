<?php

namespace App\Http\Livewire\Couters;

use App\Models\Counter;
use Livewire\Component;

class Counters extends Component
{
    public $count=1;

    public function render()
    {
        return view('livewire.couters.counters');
    }
}
