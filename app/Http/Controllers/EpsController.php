<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\EPS;

class EpsController extends Controller
{

    public function index()
    {
         //seleccion de recursos
         $eps = EPS::all();
         //retorna recursos
         return view('eps.index')->with("eps", $eps);
    }


    public function create()
    {
        return view('eps.create');
    }


    public function store(Request $request)
    {
         //Proceso para validar datos (laravel)
        //1. Establecer la reglas de validacion en un arreglo
        $reglas=[
            "NEPS" => 'unique:App\EPS,NombreEPS|required|max:50',
        ];

        //1.1. Establecer mensajes de validacion
        $mensajes=[
            "required" => "Campo requerido",
            "max" => "Debe tener máximo :max caracteres",
            "unique" => "EPS ya registrada"
        ];



        //2. Crear el objeto epecial para validacion
        $validador = Validator::make($request->all(), $reglas, $mensajes);

        //3. realizar la validacion utilizando el validador(fails)
        if($validador->fails())//True por que falla
        {
            //zona de fallo
            return redirect('eps/create')
            ->withErrors($validador)
            ->withInput();
        }


        //Traer el maxio Id que este en la tabla cliente
        $maxEps = EPS::all()->max('idEPS');
        $maxEps++;
        //Crear el nuevo recurso
        $nuevoEps = new EPS();
        $nuevoEps->idEPS = $maxEps;
        $nuevoEps->NombreEPS = $request->input("NEPS");
        $nuevoEps->estado = $request->input("EstEPS");
        $nuevoEps->save();

        return redirect('eps')
        ->with("mensaje_exito" , "EPS registrada exitosamente");
    }


    public function show($id)
    {
        $eps = EPS::find($id);

        return view('eps.show')->with("eps", $eps);
    }


    public function edit($id)
    {
        //Seleccionar el recurso (singleton) con el id del parametro
        $eps = EPS::find($id);

        //Pasar ese cliente a la vista para presentarse en el formulario
        return view('eps.edit')->with('eps', $eps);
    }


    public function update(Request $request, $id)
    {
                 //Proceso para validar datos (laravel)
        //1. Establecer la reglas de validacion en un arreglo
        $reglas=[
            "NEPS" => 'unique:App\EPS,NombreEPS|required|max:50',
        ];

        //1.1. Establecer mensajes de validacion
        $mensajes=[
            "required" => "Campo requerido",
            "max" => "Debe tener máximo :max caracteres",
            "unique" => "El nombre ya esta en uso"
        ];



        //2. Crear el objeto epecial para validacion
        $validador = Validator::make($request->all(), $reglas, $mensajes);

        //3. realizar la validacion utilizando el validador(fails)
        if($validador->fails())//True por que falla
        {
            //zona de fallo
            return redirect("eps/$id/edit")
            ->withErrors($validador)
            ->withInput();
        }

       //Seleccion del recurso a modificar
       $eps = EPS::find($id);

       //actualizo el estado del cliente
       //En virtud de los datos que vengan del formlario
       $eps->NombreEPS = $request->input('NEPS');
       $eps->estado = $request->input('EstEPS');
       $eps->save();

       return redirect('eps')
        ->with("mensaje_exito" , "EPS actualizada exitosamente");
    }

    public function destroy($id)
    {
       //
    }

    public function estado($id)
    {
        //1. Establcer el estado del eps (null, 1=activo, 2=inactivo, 0=null)
        $eps = EPS::find($id);
        switch ($eps->estado)
        {
            case null:$eps->estado = 1;
                      $eps->save();
                      $mensaje =  "Estado activo asiganado a la eps: $eps->NombreEPS";
                      break;

            case 1:$eps->estado = 2;
                      $eps->save();
                      $mensaje =  "Estado inactivo asiganado a la eps: $eps->NombreEPS";
                      break;

            case 2: $eps->estado = 1;
                      $mensaje = "Estado actio asignado a la eps: $eps->NombreEPS";
                      $eps->save();
                      break;

        }
        //redireccionar a la ruta por defecto (index 'eps')
        //con un mesaje de exito
        return redirect('eps')->with('mensaje_exito', $mensaje);
    }
}
