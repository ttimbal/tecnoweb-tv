<?php

namespace App\View\Components;

use App\Models\Counter;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public $counter = 1;

    public function render(): View
    {
        return view('layouts.app');
    }
}
