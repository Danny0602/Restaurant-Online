<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarMenu extends Component
{

    use WithFileUploads;
    public $menu_id;
    public $nombre;
    public $categoria;
    public $descripcion;
    public $precio;
    public $imagen;
    public $imagen_nueva;


    public function mount(Menu $menu)
    {
        $this->menu_id = $menu->id;
        $this->nombre = $menu->nombre;
        $this->categoria = $menu->categoria_id;
        $this->descripcion = $menu->descripcion;
        $this->precio=$menu->precio;
        
       
       
        $this->imagen = $menu->img;
    }

    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.editar-menu',[
            'categorias' => $categorias,
        ]);
    }
}
