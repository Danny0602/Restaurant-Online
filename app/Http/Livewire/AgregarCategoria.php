<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class AgregarCategoria extends Component
{
    public $nombre;



    protected $rules = [
        'nombre' => "required",
    ];

    public function submit()
    {
        $datos = $this->validate();

        Categoria::create([
            'categoria' => $datos['nombre'],
            
        ]);

        //crear un mensaje
        session()->flash('message', 'Categoria agregada correctamente.');
    
        //redireccionar
        return redirect()->route('categorias.index');
    }





    public function render()
    {
        
        return view('livewire.agregar-categoria');
    }
}
