<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index(){
        return view('categoria.index');
    }

    public function create(){
        return view('categoria.create');
    }




}
