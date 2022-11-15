<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pago extends Controller
{
    public function index(){
        return view('pago.index');
    }
}
