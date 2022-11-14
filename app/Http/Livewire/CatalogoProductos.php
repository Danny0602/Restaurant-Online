<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Menu;
use Livewire\Component;

class CatalogoProductos extends Component
{
    public function render()
    {
        $categorias = Categoria::all();
        $productos = Menu::all();
        return view('livewire.catalogo-productos',[
            'productos' => $productos,
            'categorias' => $categorias
        ]);
    }
}
