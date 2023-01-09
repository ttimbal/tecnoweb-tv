<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public $countOfPrograms;
    public $countOfPublicity;
    public $timeOfPrograms;
    public $timeOfPublicity;

    public function render()
    {
        $this->countOfPrograms = Event::where('type', 'programa')->count();
        $this->countOfPublicity = Event::where('type', 'publicidad')->count();
        $programs = Event::where('type', 'programa')->get();
        $publicities = Event::where('type', 'publicidad')->get();
        $timePrograms = Carbon::createFromFormat('H:i:s', '00:00:00');
        $timePublicities = Carbon::createFromFormat('H:i:s', '00:00:00');
        foreach ($programs as $program) {
            $start = new Carbon($program->start_time);
            $end = new Carbon($program->end_time);
            $difference = $start->diff($end);

            $timePrograms->addHours($difference->format('%H'))
                ->addMinutes($difference->format('%I'))
                ->addSeconds($difference->format('%S'));
        }

        foreach ($publicities as $publicity) {
            $start = new Carbon($publicity->start_time);
            $end = new Carbon($publicity->end_time);
            $difference = $start->diff($end);

            $timePublicities->addHours($difference->format('%H'))
                ->addMinutes($difference->format('%I'))
                ->addSeconds($difference->format('%S'));
        }

        $this->timeOfPrograms = $timePrograms->toTimeString();
        $this->timeOfPublicity = $timePublicities->toTimeString();

        return view('livewire.dashboard.dashboard');
    }
}
