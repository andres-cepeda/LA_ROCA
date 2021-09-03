<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
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
        $Categorias = Categoria::all();
        //retorno de recursos
        return view('Categoria.index')->with('Categorias', $Categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Categoria.create');
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
            return redirect('Categorias/create')->withErrors($validador)->withInput();
        }
        $maxcategoria = Categoria::all()->max('idCat');
        $maxcategoria++;
        //crear el nuevo recurso cliente
        $nuevacategoria = new Categoria();
        $nuevacategoria->idCat = $maxcategoria;
        $nuevacategoria->NombreCat = $request->input("nombre");
        $nuevacategoria->estado = $request->input("estado");
        $nuevacategoria->save();

        //redireccionamiento a una vista

        return redirect('Categorias')->with("mensaje_exito", "Categoria registrado exitosamente");
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
        $Categoria = Categoria::find($id);
        if ($Categoria->estado==1) {
            $Categoria->estado='Activo';
        }else if ($Categoria->estado==2) {
            $Categoria->estado='Inactivo';
        }
        //pasarlo a la vista detalle
        return view('Categoria.show')->with("Categoria",$Categoria);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //seleccionar el recurso (singleton) con el id de paametro
        $Categoria = Categoria::find($id);
        //pasar ese cliente ala vista para presentarse al formulario
        return view('Categoria.edit')->with('Categoria',$Categoria);    }

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
       $Categoria = Categoria::find($id);
       //relizar la validacion utilizando el validtor(fails)
        if($validador->fails()){
            //zona de fallo
            return redirect('Categorias/'.$Categoria->idCat.'/edit')->withErrors($validador)->withInput();
        }

        //actualizar los datos de recurso
        //en virtud de los datos que vengan del formulario
        $Categoria->NombreCat = $request->input("nombre");
        $Categoria->estado = $request->input("estado");
        $Categoria->Save();


        return redirect('Categorias')->with("mensaje_exito", "Categoria actualizado exitosamente");
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
        $Categoria = Categoria::find($id);
        switch($Categoria->estado) {
            case null:$Categoria->estado = 1;
                      $Categoria->save();
            break;
            case 1:$Categoria->estado =2;
                $Categoria->save();
            break;
        }

        //redireccionar a la ruta por defecto (index:'cliente') con un mensaje de exito
        return redirect('Categorias');
    }
}
