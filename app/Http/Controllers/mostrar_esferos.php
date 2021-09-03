<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mostrar_esferos extends Controller
{
    public function esferos()
    {
        //Mostrar la vista del metabuscador
        return view('esferos');
    }
}
