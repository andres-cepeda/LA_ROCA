<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = "producto";
    protected $primaryKey = "idProd";
    public $timestamps = false;
}
