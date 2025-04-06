<?php

namespace App\Livewire;

use Livewire\Component;

class BookingManager extends Component
{
    public $name;
    public $date;

    public function submit()
    {
        // Ex: créer une réservation ou envoyer un mail
        session()->flash('success', 'Réservation enregistrée');
    }

    public function render()
    {
        return view('livewire.booking-manager');
    }
}
