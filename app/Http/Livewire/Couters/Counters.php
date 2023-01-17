<?php

namespace App\Http\Livewire\Couters;

use App\Models\Counter;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Counters extends Component
{
    public $counter=1;

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
        return view('livewire.couters.counters');
    }
}
