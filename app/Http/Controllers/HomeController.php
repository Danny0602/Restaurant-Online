<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $categorias = Categoria::all();
        return view('home.index',[
            'categorias' => $categorias
        ]);
    }
}
