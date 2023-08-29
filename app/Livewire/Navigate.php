<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cat;
class Navigate extends Component
{
    public $cats;
    public function mount(){
        $this->cats =Cat::all();
    }
    public function render()
    {
        return view('livewire.navigate');
    }
}
