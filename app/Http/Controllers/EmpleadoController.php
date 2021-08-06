<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\EPS;
use App\Usuario;

class EmpleadoController extends Controller
{

    public function index()
    {
        //seleccion de recursos
        $empleados = Empleado::where('Estado' ,'like', 1)->get();
        $eps = EPS::where('Estado' ,'like', 1)->get();
        $usuarios = Usuario::where('idRol' ,'Not like', 3)->get();


        //retorna recursos
        return view('empleado.index', compact('eps'),compact('usuarios'))->with("empleados", $empleados);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        //Traer el maxio Id que este en la tabla cliente
        $maxEmp = Empleado::all()->max('idEmp');
        $maxEmp++;
        //Crear el nuevo recurso
        $nuevoEmp = new Empleado();
        $nuevoEmp->idEmp = $maxEmp;
        $nuevoEmp->codEmp = $request->input("CodEmp");
        $nuevoEmp->nombres = $request->input("Nombre");
        $nuevoEmp->apellidos = $request->input("Apellido");
        $nuevoEmp->tipoDoc = $request->input("TipDoc");
        $nuevoEmp->cedula = $request->input("Cedula");
        $nuevoEmp->tel = $request->input("Tel");
        $nuevoEmp->email = $request->input("Correo");
        $nuevoEmp->direccion = $request->input("Dirección");
        $nuevoEmp->estado = $request->input("EstCli");
        $nuevoEmp->idUsuario = $request->input("IdUsuario");
        $nuevoEmp->idEPS = $request->input('IdEPS');

        $nuevoEmp->save();
        return redirect('empleado')
               ->with("mensaje_exito" , "Empleado registrado exitosamente");
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.show')->with("empleado", $empleado);
    }

    public function edit($id)
    {
        //Seleccionar el recurso (singleton) con el id del parametro
        $empleado = Empleado::find($id);

        //Pasar ese cliente a la vista para presentarse en el formulario
        return view('empleado.edit')->with('empleado', $empleado);
    }

    public function update(Request $request, $id)
    {
        //Seleccion del recurso a modificar
        $empleado = Empleado::find($id);

        //actualizo el estado del cliente
        //En virtud de los datos que vengan del formlario

        $empleado->codEmp = $request->input("CodEmp");
        $empleado->nombres = $request->input("Nombre");
        $empleado->apellidos = $request->input("Apellido");
        $empleado->tipoDoc = $request->input("TipDoc");
        $empleado->cedula = $request->input("Cedula");
        $empleado->tel = $request->input("Tel");
        $empleado->email = $request->input("Correo");
        $empleado->direccion = $request->input("Dirección");
        $empleado->estado = $request->input("EstCli");
        $empleado->idUsuario = $request->input("IdUsuario");
        $empleado->idEPS = $request->input('IdEPS');
        $empleado->save();

        return redirect('empleado')
        ->with("mensaje_exito1" , "Empleado actualizado exitosamente");
    }

    public function destroy($id)
    {
        //Seleccionar el recurso (singleton) con el id del parametro
        $empleado = Empleado::find($id);

        //Pasar ese cliente a la vista para presentarse en el formulario
        return view('empleado.edit')->with('empleado', $empleado);
    }
}
