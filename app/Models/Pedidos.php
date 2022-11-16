<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pedido',
        'tarjeta',
        'dia_tarjeta',
        'mes_tarjeta',
        'admin'


    ];
    public function administrador()
    {
        return $this->belongsTo(User::class, 'admin');
    }
}
