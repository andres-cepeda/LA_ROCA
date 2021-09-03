<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MarcaController extends Controller
{
    public function __construct()
    {
        $this->middleware('miautenticacion');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //seleccion de recursos
        $Marcas = Marca::all();
        //retorno de recursos
        return view('Marca.index')->with('Marcas', $Marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //proceso para validar datos
        //establecer las rreglaas de vvalidacion en un parametro
        $reglas = [
            "nombre" => 'required|alpha|max:10' ,
            "estado"=> 'required|max:10'
        ];
        //Establecer mensaje de validacion
        $mensajes = [
            "required" => "Campo requerido",
            "alpha" => "Solo letras",
            "max" => "Debe tener maximo :max caracteres"
        ];
        //crear el objeto especial de validacion
        //traer el maximo id cliente qe este en la tabla clientes
       $validador = Validator::make($request->all(), $reglas, $mensajes);
        //relizar la validacion utilizando el validtor(fails)
        if($validador->fails()){
            //zona de fallo
            return redirect('Marcas/create')->withErrors($validador)->withInput();
        }
        $maxmarca = Marca::all()->max('idMar');
        $maxmarca++;
        //crear el nuevo recurso cliente
        $nuevamarca = new Marca();
        $nuevamarca->idMar = $maxmarca;
        $nuevamarca->NombreMar = $request->input("nombre");
        $nuevamarca->estado = $request->input("estado");
        $nuevamarca->save();

        //redireccionamiento a una vista

        return redirect('Marcas')->with("mensaje_exito", "Marca registrada exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //seleccion del recurso cuyo id es el paramerto
        $Marca = Marca::find($id);
        if ($Marca->estado==1) {
            $Marca->estado='Activo';
        }else if ($Marca->estado==2) {
            $Marca->estado='Inactivo';
        }
        //pasarlo a la vista detalle
        return view('Marca.show')->with("Marca",$Marca);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //seleccionar el recurso (singleton) con el id de paametro
        $Marca = Marca::find($id);
        //pasar ese cliente ala vista para presentarse al formulario
        return view('Marca.edit')->with('Marca',$Marca);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //proceso para validar datos
        //establecer las rreglaas de vvalidacion en un parametro
        $reglas = [
            "nombre" => 'required|alpha|max:10' ,
            "estado"=> 'required|max:10'
        ];
        //Establecer mensaje de validacion
        $mensajes = [
            "required" => "Campo requerido",
            "alpha" => "Solo letras",
            "max" => "Debe tener maximo :max caracteres"
        ];
        //crear el objeto especial de validacion
        //traer el maximo id cliente qe este en la tabla clientes
       $validador = Validator::make($request->all(), $reglas, $mensajes);
       //seleccion del recurso a moddifiar (singleton)
       $Marca = Marca::find($id);
       //relizar la validacion utilizando el validtor(fails)
        if($validador->fails()){
            //zona de fallo
            return redirect('Marcas/'.$Marca->idMar.'/edit')->withErrors($validador)->withInput();
        }

        //actualizar los datos de recurso
        //en virtud de los datos que vengan del formulario
        $Marca->NombreMar = $request->input("nombre");
        $Marca->estado = $request->input("estado");
        $Marca->Save();


        return redirect('Marcas')->with("mensaje_exito", "Marca actualizada exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function inactivar($id)
    {
        //establecer  el estado del producto(1=activo, 0=inactivo )
        $Marca = Marca::find($id);
        switch($Marca->estado) {
            case null:$Marca->estado = 1;
                $Marca->save();
            break;
            case 1:$Marca->estado =2;
                $Marca->save();
            break;
        }

        //redireccionar a la ruta por defecto (index:'cliente') con un mensaje de exito
        return redirect('Marcas');
    }
}
