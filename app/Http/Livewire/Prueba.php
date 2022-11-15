<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class Prueba extends Component
{

    
    public function render(Categoria $categoria)
    {
        return view('livewire.prueba',[
            'categoria' => $categoria
        ]);
    }
}
