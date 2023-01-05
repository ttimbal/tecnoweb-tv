<?php

namespace App\Http\Livewire\Users;

use App\Models\Counter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Users extends Component
{
    public $users, $name, $email, $phone_number, $date_of_birth, $type, $password, $user_id;
    public $isOpen = 0;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users.users');
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
        $this->email = '';
        $this->user_id = '';
        $this->date_of_birth = '';
        $this->password = '';
        $this->type = '';
        $this->phone_number = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $customRules = collect([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => ['required'],
            'date_of_birth' => ['required'],
            'type' => ['required'],
        ]);


        $data = collect([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'date_of_birth' => $this->date_of_birth,
            'type' => $this->type,
        ]);

        if (!$this->user_id) {
            $data->put('password', Hash::make($this->password));
            $customRules->put('password', ['required']);
            /*$data=array_add($data, 'password',['required']);
            $customRules=array_add($customRules, 'password',Hash::make($this->password));*/
        }

        $this->validate($customRules->toArray());

        User::updateOrCreate(['id' => $this->user_id ?: '0'], $data->toArray());

        session()->flash('message',
            $this->user_id ? 'User Updated Successfully.' : 'User Created Successfully.');

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
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->date_of_birth = $user->date_of_birth;
        $this->type = $user->type;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }
}
