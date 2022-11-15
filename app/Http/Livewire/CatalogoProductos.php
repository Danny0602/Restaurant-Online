<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Menu;
use Livewire\Component;
use App\Models\Categoria;
use Darryldecode\Cart\Cart as CartCart;
use Illuminate\Support\Facades\Auth;

class CatalogoProductos extends Component
{
    

    protected $listeners  = ['agregarProductoCarrito'];

    public $categoria;

    public function render()
    {
        $categorias = Categoria::all();
        $productos = Menu::all();
        return view('livewire.catalogo-productos',[
            'productos' => $productos,
            'categoria' => $this->categoria
        ]);
    }




    public function agregarProductoCarrito(Menu $menu)
    {

        //  \Cart::clear();

        // return 'si';

        
        \Cart::add(array(
            'id' =>$menu->id, // inique row ID
             
             'name' =>$menu->nombre,
             'price' =>$menu->precio,
             'quantity' => 1,
             'attributes' => [
                'img' => $menu->img
             ]
             
        ));
        
        
        

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Agregado al carrito ',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
        
        

        
    }

}
