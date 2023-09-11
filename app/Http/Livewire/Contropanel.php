<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contropanel extends Component
{
    public $page = 'setting';

    public function switchPage($page){
        $this->page = $page;
    }
    public function render()
    {
        return view('livewire.contropanel');
    }
}
