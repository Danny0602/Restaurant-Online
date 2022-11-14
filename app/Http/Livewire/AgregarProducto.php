<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

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

    public function submit()
    {
        $datos = $this->validate();

        $datos['imagen']->store('public/imagenes');
        $imageName = $datos['imagen']->hashName();
        $data['imagen'] = $imageName;

        $manager = new ImageManager();
        $image = $manager->make('storage/imagenes/'.$imageName)->resize(300,300);
        $image->save('storage/imagenes-ajustadas/'.$imageName);

        $datos['imagen'] = $imageName;
      
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
        return view('livewire.agregar-producto', [
            'categorias' => $categorias
        ]);
    }
}
