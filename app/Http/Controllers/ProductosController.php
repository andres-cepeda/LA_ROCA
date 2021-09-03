<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Marca;
use Illuminate\Http\Request;
use App\Productos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller
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
        $Productos = Productos::all();
        //retorno de recursos
        return view('Producto.index')->with('Productos', $Productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categoria = Categoria::all();
        $Marca = Marca::all();
        $Datos = (object) array('Categoria' => $Categoria, 'Marca' => $Marca);
        return view('Producto.create')->with('Datos', $Datos);
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
            "codigo" => 'required|max:10',
            "nombre" => 'required|max:100' ,
            "valor"=> 'required|max:50',
            "stock"=> 'required|max:50',
            "estado" => 'required|max:10',
            "categoria" => 'required|max:10',
            "marca" => 'required|max:10'
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
            return redirect('Productos/create')->withErrors($validador)->withInput();
        }
        $maxproducto = Productos::all()->max('idProd');
        $maxproducto++;
        //crear el nuevo recurso cliente
        $nuevoproducto = new Productos();
        $nuevoproducto-> idProd = $maxproducto;
        $nuevoproducto-> codProd = $request->input("codigo");
        $nuevoproducto-> nombre = $request->input("nombre");
        $nuevoproducto-> valor = $request->input("valor");
        $nuevoproducto-> urlImagen = $nuevoproducto->nombre.'.'.$request->file("imagen")->extension();
        $nuevoproducto-> stock = $request->input("stock");
        $nuevoproducto-> estado = $request->input("estado");
        $nuevoproducto-> idCat = $request->input("categoria");
        $nuevoproducto-> idMar = $request->input("marca");
        $nuevoproducto->save();

        $file = $request->file("imagen");
        //var_dump($file);
        $ext = $file->extension();
        $filename = $file->storeAs('/imagen/', $nuevoproducto-> urlImagen ,['disk' => 'public_uploads']);

        //redireccionamiento a una vista

        return redirect('Productos')->with("mensaje_exito", "Producto registrado exitosamente");

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
        $Producto = Productos::find($id);
        //consulta multitaabla
        $Categoria=DB::select('select NombreCat from Categoria WHERE idCat= ?', [$Producto->idCat]);
        $Producto->idCat=$Categoria[0]->NombreCat;
        $Marca=DB::select('select NombreMar from Marca WHERE idMar= ?', [$Producto->idMar]);
        $Producto->idMar=$Marca[0]->NombreMar;
        if ($Producto->estado==1) {
            $Producto->estado='Activo';
        }else if ($Producto->estado==2) {
            $Producto->estado='Inactivo';
        }
        //pasarlo a la vista detalle
        return view('Producto.show')->with("Producto",$Producto);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //seleccionar el recurso (singleton) con el id de paametro
        $Producto = Productos::find($id);
        $Categorias = Categoria::all();
        $Marcas = Marca::all();
        //pasar ese cliente ala vista para presentarse al formulario
        return view('Producto.edit')->with('Producto', $Producto)
                                        ->with('Categorias', $Categorias)
                                        ->with('Marcas', $Marcas);
    }

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
            "codigo" => 'required|max:10',
            "nombre" => 'required|max:100' ,
            "valor"=> 'required|max:50',
            "stock"=> 'required|max:50',
            "estado" => 'required|max:10',
            "categoria" => 'required|max:10',
            "marca" => 'required|max:10'
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
       $Producto = Productos::find($id);
       //relizar la validacion utilizando el validtor(fails)
        if($validador->fails()){
            //zona de fallo
            return redirect('Productos/'.$Producto->idProd.'/edit')->withErrors($validador)->withInput();
        }

        //actualizar los datos de recurso
        //en virtud de los datos que vengan del formulario
        $Producto-> codProd = $request->input("codigo");
        $Producto-> nombre = $request->input("nombre");
        $Producto-> valor = $request->input("valor");
        $Producto-> urlImagen = $Producto->nombre.'.'.$request->file("imagen")->extension();
        $Producto-> stock = $request->input("stock");
        $Producto-> estado = $request->input("estado");
        $Producto-> idCat = $request->input("categoria");
        $Producto-> idMar = $request->input("marca");
        $Producto->save();


        $file = $request->file("imagen");
        //var_dump($file);
        $ext = $file->extension();
        $filename = $file->storeAs('/imagen/',  $Producto-> urlImagen ,['disk' => 'public_uploads']);

        return redirect('Productos')->with("mensaje_exito", "Producto actualizado exitosamente");
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
        $Producto = Productos::find($id);
        switch($Producto->estado) {
            case null:$Producto->estado = 1;
                      $Producto->save();
            break;
            case 1:$Producto->estado =2;
                $Producto->save();
            break;
        }

        //redireccionar a la ruta por defecto (index:'cliente') con un mensaje de exito
        return redirect('Productos');
    }

    public function vista()
    {
        //seleccion de recursos
        $Productos = Productos::all();
        //retorno de recursos
        return view('Producto.vista')->with('Productos', $Productos);
    }
}
