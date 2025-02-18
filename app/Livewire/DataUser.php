<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DataUser extends Component
{
    public $search;
    public $name, $email,$password;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ];

    public function tambah()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'User berhasil ditambahkan!');

        $this->reset(['name', 'email', 'password']);
    }


    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->search.'%')->get();
        return view('livewire.data-user', [
            'users' => $users
        ]);
    }
}
