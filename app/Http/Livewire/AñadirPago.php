<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Notifications\Pedidos;
use App\Models\Pedidos as ModelsPedidos;
use Illuminate\Support\Facades\Notification;


class AñadirPago extends Component
{

    public $cvv;
    public $tarjeta;
    public $dia;
    public $mes;
    public $nombre;

    protected $rules=[
        'nombre' => 'required|min:6',
        'tarjeta' => 'required|min:16|max:16',
        'dia' => 'required',
        'mes' => 'required',
        'cvv' => 'required|min:3|max:3',
    ];

    public function submit(){
        $datos= $this->validate();

       $this->pedidos = ModelsPedidos::create([
            'user_id' => auth()->user()->id,
            'admin' => 1,
            'pedido' => \Cart::getContent(),
            'tarjeta' => $datos['tarjeta'],
            'dia_tarjeta' => $datos['dia'],
            'mes_tarjeta' => $datos['mes'],

        ]);

        
       
        $this->pedidos->administrador->notify(new Pedidos(auth()->user()->name,\Cart::getContent()));
        \Cart::clear();


        session()->flash('message','Pedido Realizado Correctamente, Pasa a recogerlo');

        return redirect()->to('/');

    }

    public function render()
    {
        return view('livewire.añadir-pago');
    }
}
