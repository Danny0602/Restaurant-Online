<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $notificaciones = auth()->user()->unreadNotifications;

        // auth()->user()->unreadNotifications->markAsRead();
        $pedidos = Pedidos::all();
        return view('notificaciones.index', [
            'notificaciones' => $notificaciones,
            'pedidos' => $pedidos
        ]);
    }
}
