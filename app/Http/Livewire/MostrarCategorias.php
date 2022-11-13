<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class MostrarCategorias extends Component
{

    protected $listeners  = ['eliminarCategoria'];

    public function eliminarCategoria(Categoria $categoria)
    {
        // dd('eliminando');
        $categoria->delete();
    }




    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.mostrar-categorias',[
            'categorias'=> $categorias
        ]);
    }
}
