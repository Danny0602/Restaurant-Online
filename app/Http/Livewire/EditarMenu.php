<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;

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
            $datos['imagen_nueva']->store('public/imagenes');
            $imageName = $datos['imagen_nueva']->hashName();
            $data['imagen_nueva'] = $imageName;
    
            $manager = new ImageManager();
            $image = $manager->make('storage/imagenes/'.$imageName)->resize(300,300);
            $image->save('storage/imagenes-ajustadas/'.$imageName);
    
            $datos['imagen_nueva'] = $imageName;
        }

        $producto = Menu::find($this->menu_id);

        $producto->nombre = $datos['nombre'];
        $producto->categoria_id = $datos['categoria'];
        $producto->precio = $datos['precio'];
        $producto->descripcion = $datos['descripcion'];
        $producto->img = $datos['imagen_nueva'] ?? $producto->img; 
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
