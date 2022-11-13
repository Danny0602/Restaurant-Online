<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class MostrarMenu extends Component
{
    public function disponible(Menu $menu){
      $menu->disponibilidad = !$menu->disponibilidad;
      $menu->save();
    }

    public function render()
    {
        $productos = Menu::all();
        return view('livewire.mostrar-menu',[
            'productos' => $productos
        ]);
    }
}
