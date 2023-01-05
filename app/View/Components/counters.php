<?php

namespace App\View\Components;

use App\Models\Counter;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class counters extends Component
{
    public int $counter=1;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $routeName = Route::currentRouteName();
        $counterPerPage = Counter::where('page', $routeName)->first();
        if ($counterPerPage !== null) {
            Counter::where('page', $routeName)->increment('counter', 1);
            $this->counter = $counterPerPage->counter+1;
        } else {
            Counter::create([
                "page" => $routeName,
                "counter" => 1
            ]);
        }

        return view('components.counters');
    }
}
