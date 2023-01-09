<?php

namespace App\Http\Livewire\Calendar;


use App\Models\Counter;
use App\Models\User;
use App\Models\Category;
use App\Models\Day;
use App\Models\Equipment;
use App\Models\Event;
use App\Models\Event_category;
use App\Models\Event_per_day;
use App\Models\Event_turn;
use App\Models\Turn;
use Livewire\Component;

class Main extends Component
{
    public $events, $categories, $equipments, $turns, $days, $presenters, $name, $start_date, $end_date, $start_time, $end_time, $type, $event_id, $category_id, $equipment_id, $turn_id, $presenter_id;
    public $isOpen = 0;


    public $selectedDays = [];
    public $nameOfSelectedDays = [];


    protected $listeners = [
        'eventClicked' => 'eventClicked',
        'createEvent' => 'createEvent',
    ];

    public function render()
    {
        $this->events = Event::all();
        $this->events = $this->events->load('categories');
        $this->events = $this->events->load('turns');
        $this->events = $this->events->load('days');

        //dd($this->events[0]->turns[0]->id);
        $this->categories = Category::all();
        $this->equipments = Equipment::all();
        $this->presenters = User::where('type', 'pres')->get();
        $this->turns = Turn::all();
        $this->days = Day::orderBy('id')->get();
        // $this->dispatchBrowserEvent('contentChanged');
        return view('livewire.calendar.main');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    public function eventClicked($info)
    {
        //@dd($info['event']['id']);
        $this->edit($info['event']['id']);
        $this->openModal();
    }

    public function createEvent($info)
    {
        //@dd($date);
        $this->openModal();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->start_time = '';
        $this->end_time = '';
        $this->type = '';
        $this->event_id = null;
        $this->category_id = null;
        $this->equipment_id = null;
        $this->turn_id = null;
        $this->presenter_id = null;
        $this->selectedDays = [];

    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'type' => 'required',
            'category_id' => 'required',
            //'equipment_id' => 'required',
            'turn_id' => 'required',
            'presenter_id' => 'required',
            'selectedDays' => 'required|array|between:1,7'
        ]);

        $event = Event::updateOrCreate(['id' => $this->event_id ?: '0'], [
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'type' => $this->type,
            'presenter_id' => $this->presenter_id,
        ]);

        Event_turn::where('event_id', $event->id)->where('turn_id', $this->turn_id)->delete();
        $eventTurn = new Event_turn();
        $eventTurn->event_id = $event->id;
        $eventTurn->turn_id = $this->turn_id;
        $eventTurn->save();
        /*        Event_turn::Create([
                    'event_id' =>
                    'turn_id' =>
                ]);*/

        Event_category::where('event_id', $event->id)->where('category_id', $this->category_id)->delete();
        /*        Event_category::Create([
                    'event_id' => $event->id,
                    'category_id' => $this->category_id
                ]);*/
        $eventCategory = new Event_category();
        $eventCategory->event_id = $event->id;
        $eventCategory->category_id = $this->category_id;
        $eventCategory->save();

        Event_per_day::where('event_id', $event->id)->delete();
       $unique_days = array_unique($this->selectedDays);
        foreach ($unique_days as $selectedDay) {

            Event_per_day::Create([
                'event_id' => $event->id,
                'day_id' => $selectedDay
            ]);
        }

        session()->flash('message', $this->event_id ? 'Event Updated Successfully.' : 'Event Created Successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $event = $event->load('categories');
        $event = $event->load('turns');
        $event = $event->load('days');
        $event = $event->load('presenter');
        $this->name = $event->name;
        $this->start_date = $event->start_date;
        $this->end_date = $event->end_date;
        $this->start_time = $event->start_time;
        $this->end_time = $event->end_time;
        $this->type = $event->type;
        $this->event_id = $event->id;
        $this->category_id = $event->categories[0]->id;
        $this->turn_id = $event->turns[0]->id;
        $this->presenter_id = $event->presenter->id;
        foreach ($event->days as $day) {
            $this->selectedDays[] = $day->id;
        }

        $this->openModal();
    }

    public function delete($id)
    {
        Event::find($id)->delete();
        session()->flash('message', 'Event Deleted Successfully.');
        $this->closeModal();
    }
}
