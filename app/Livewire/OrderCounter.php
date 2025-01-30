<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderCounter extends Component
{
    public function render()
    {
        return view('livewire.order-counter');
    }
}
