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

    protected $listeners  = ['eliminarMenu'];

    public function eliminarMenu(Menu $menu)
    {
        // dd('eliminando');
        $menu->delete();
    }




    public function render()
    {        
        $productos = Menu::paginate(5);

        return view('livewire.mostrar-menu',[
            'productos' => $productos
        ]);
    }
}
