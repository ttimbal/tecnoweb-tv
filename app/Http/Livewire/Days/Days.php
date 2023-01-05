<?php

namespace App\Http\Livewire\Days;

use App\Models\Counter;
use App\Models\Day;
use Livewire\Component;

class Days extends Component
{

    public $days, $name, $day_id;
    public $isOpen = 0;

    public function render()
    {
        $this->days = Day::orderBy('id')->get();;
        return view('livewire.days.days');
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
        $this->day_id = '';
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
        ]);

        Day::updateOrCreate(['id' => $this->day_id ?: '0'], [
            'name' => $this->name
        ]);

        session()->flash('message',
            $this->day_id ? 'Day Updated Successfully.' : 'Day Created Successfully.');

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
        $day = Day::findOrFail($id);
        $this->day_id = $id;
        $this->name = $day->name;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Day::find($id)->delete();
        session()->flash('message', 'Day Deleted Successfully.');
    }
}
