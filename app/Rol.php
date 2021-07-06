<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "rol";
    protected $primaryKey = "idRol";
    public $timestamps = false;

    /*private $idRol;
    private $NombreRol;

    //ENCAPSULAMIENTO
    public function getidRol(){
        return $this->idRol;
    }
    public function setidRol($CodRol){
        $this->idRol=$CodRol;
    }

    public function getNombreRol(){
        return $this->NombreRol;
    }
    public function setNombreRol($NomRol){
        $this->NombreRol=$NomRol;
    }

    //METODOS
    public function registrar()
    {

    }
    public function consultar()
    {

    }
    public function modificar()
    {

    }
    public function inhabilitar()
    {

    }*/
}
