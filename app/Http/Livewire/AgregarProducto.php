<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithFileUploads;

class AgregarProducto extends Component
{
    use WithFileUploads;
    public $nombre;
    public $categoria;
    public $descripcion;
    public $precio;
    public $imagen;

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'categoria' => 'required|numeric',
        'precio' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    public function submit(){
         $datos = $this->validate();

        $imagen = $this->imagen->store('public/menu');
        $datos['imagen'] = str_replace('public/menu/', '',$imagen);


        Menu::create([
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion'],
            'categoria_id' => $datos['categoria'],
            'precio' => $datos['precio'],
            'disponibilidad' => true,
            'img' => $datos['imagen'],
            
            
            ]);
    
    
            //crear un mensaje
            session()->flash('message', 'Producto agregado correctamente.');
    
            //redireccionar
            return redirect()->route('dashboard');


    }



    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.agregar-producto',[
            'categorias' => $categorias
        ]);
    }
}
