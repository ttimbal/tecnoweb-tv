<?php

namespace App\Http\Livewire\Equipments;

use App\Models\Counter;
use App\Models\Equipment;
use Livewire\Component;

class Equipments extends Component
{

    public $equipments, $name, $code, $equipment_id;
    public $isOpen = 0;

    public function render()
    {
        $this->equipments = Equipment::all();
        return view('livewire.equipments.equipments');
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
        $this->code = '';
        $this->equipment_id = '';
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
            'code' => 'required',
        ]);

        Equipment::updateOrCreate(['id' => $this->equipment_id ?: '0'], [
            'name' => $this->name,
            'code' => $this->code
        ]);

        session()->flash('message',
            $this->equipment_id ? 'Equipment Updated Successfully.' : 'Equipment Created Successfully.');

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
        $equipment = Equipment::findOrFail($id);
        $this->equipment_id = $id;
        $this->name = $equipment->name;
        $this->code = $equipment->code;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Equipment::find($id)->delete();
        session()->flash('message', 'Equipment Deleted Successfully.');
    }
}
