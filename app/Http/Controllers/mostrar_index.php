<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mostrar_index extends Controller
{
    public function index()
    {
        //Mostrar la vista del metabuscador
        return view('index');
    }
}
