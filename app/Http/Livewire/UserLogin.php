<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserLogin extends Component
{
    public $name;

    public $email;
    public $mobile;
    public $password;

 

    protected $rules = [

        'name' => 'required|min:6',
        'email' => 'required|email',
        'mobile' => 'required|max:10|unique',
        'password' => 'required|min:6|unique',

    ];

    protected $messages = [

        'name.required' => 'هذا الحقل مطلوب',


    ];
    public function updated($name)

    {

        $this->validateOnly($name);

    }
    public function userLogin()

    {

        $validatedData = $this->validate();

 

        User::create($validatedData);


    }
    public function render()
    {
        return view('livewire.user-login');
    }
}
