<?php

namespace App\Http\Livewire;

use App\Models\Pedidos;
use Livewire\Component;

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

        Pedidos::create([
            'user_id' => auth()->user()->id,
            'pedido' => \Cart::getContent(),
            'tarjeta' => $datos['tarjeta'],
            'dia_tarjeta' => $datos['dia'],
            'mes_tarjeta' => $datos['mes'],

        ]);

        \Cart::clear();

        session()->flash('message','Pedido Realizado Correctamente, Pasa a recogerlo');

        return redirect()->to('/');

    }

    public function render()
    {
        return view('livewire.añadir-pago');
    }
}
