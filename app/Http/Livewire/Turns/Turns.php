<?php

namespace App\Http\Livewire\Turns;

use App\Models\Counter;
use App\Models\Turn;
use Livewire\Component;

class Turns extends Component
{
    public $turns, $name, $start_time, $end_time, $turn_id;
    public $isOpen = 0;

    public function render()
    {
        $this->turns = Turn::all();
        return view('livewire.turns.turns');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->name = '';
        $this->start_time = '';
        $this->end_time = '';
        $this->turn_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Turn::updateOrCreate(['id' => $this->turn_id ?: '0'], [
            'name' => $this->name,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time
        ]);

        session()->flash('message',
            $this->turn_id ? 'Turn Updated Successfully.' : 'Turn Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $equipment = Turn::findOrFail($id);
        $this->turn_id = $id;
        $this->name = $equipment->name;
        $this->start_time = $equipment->start_time;
        $this->end_time = $equipment->end_time;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Turn::find($id)->delete();
        session()->flash('message', 'Turn Deleted Successfully.');
    }
}
