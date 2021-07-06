<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido_Domicilio extends Model
{
    protected $table = "pedido_domicilio";
    protected $primaryKey = "idDom";
    public $timestamps = false;
}
