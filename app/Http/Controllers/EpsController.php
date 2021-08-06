<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EPS;

class EpsController extends Controller
{

    public function index()
    {
         //seleccion de recursos
         $eps = EPS::where('Estado' ,'like', 1)->get();
         //retorna recursos
         return view('eps.index')->with("eps", $eps);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

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
       //Seleccionar el recurso (singleton) con el id del parametro
       $eps = EPS::find($id);

       //Pasar ese cliente a la vista para presentarse en el formulario
       return view('eps.delete')->with('eps', $eps);
    }
}
