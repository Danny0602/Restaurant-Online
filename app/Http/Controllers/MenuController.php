<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        return view('menu.index');
    }


    public function create()
    {
        return view('menu.create');
    }


    public function edit(Menu $menu)
    {
        
        return view('menu.edit', [
        'menu' => $menu    
        ]);
    }
}
