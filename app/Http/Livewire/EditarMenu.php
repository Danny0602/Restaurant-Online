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

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'categoria' => 'required|numeric',
        'precio' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024',
    ];


    public function mount(Menu $menu)
    {
        $this->menu_id = $menu->id;
        $this->nombre = $menu->nombre;
        $this->categoria = $menu->categoria_id;
        $this->descripcion = $menu->descripcion;
        $this->precio=$menu->precio;
        $this->imagen = $menu->img;

    }


    public function submit(){
        $datos = $this->validate();

        if ($this->imagen_nueva) {
            $imagen = $this->imagen_nueva->store('public/menu');
            $datos['imagen'] = str_replace('public/menu/', '', $imagen);
        }

        $producto = Menu::find($this->menu_id);

        $producto->nombre = $datos['nombre'];
        $producto->categoria_id = $datos['categoria'];
        $producto->precio = $datos['precio'];
        $producto->descripcion = $datos['descripcion'];
        $producto->img = $datos['imagen'] ?? $producto->img; 
        $producto->save();

        //crear un mensaje
        session()->flash('message', 'Producto actualizado correctamente.');

        //redireccionar
        return redirect()->route('dashboard');


    }

    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.editar-menu',[
            'categorias' => $categorias,
        ]);
    }
}
