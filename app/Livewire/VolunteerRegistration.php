<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VolunteerApplication;
use Illuminate\Support\Facades\Auth;

class VolunteerRegistration extends Component
{
    public $full_name;
    public $email;
    public $whatsapp;
    public $role_interest;
    public $skills;
    public $motivation;
    public $commitment_hours;

    public $submitted = false;

    protected $rules = [
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'whatsapp' => 'required|string|max:20',
        'role_interest' => 'required|string',
        'skills' => 'required|string|max:1000',
        'motivation' => 'required|string|max:1000',
        'commitment_hours' => 'required|string',
    ];

    public function mount()
    {
        if (Auth::check()) {
            $this->full_name = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
    }

    public function submit()
    {
        $this->validate();

        VolunteerApplication::create([
            'user_id' => Auth::id(),
            'full_name' => $this->full_name,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'role_interest' => $this->role_interest,
            'skills' => $this->skills,
            'motivation' => $this->motivation,
            'commitment_hours' => $this->commitment_hours,
            'status' => 'pending',
        ]);

        $this->submitted = true;
    }

    public function render()
    {
        return view('livewire.volunteer-registration');
    }
}
