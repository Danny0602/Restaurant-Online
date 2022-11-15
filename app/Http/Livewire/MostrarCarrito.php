<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarCarrito extends Component
{

    protected $listeners  = ['eliminarDelCarrito','vaciarElCarrito'];

    public function eliminarDelCarrito($id){
        \Cart::remove($id);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Articulo Eliminado del carrito',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
        
    }
   

    public function vaciarElCarrito(){
        \Cart::clear();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Se han eliminado todos los articulos',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);

    }

    





    public function render()
    {
        return view('livewire.mostrar-carrito');
    }
}
