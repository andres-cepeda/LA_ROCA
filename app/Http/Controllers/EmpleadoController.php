<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Empleado;
use App\EPS;
use App\Usuario;

class EmpleadoController extends Controller
{

    public function index()
    {
        //seleccion de recursos
        $empleados = Empleado::all();
        $eps = EPS::where('Estado' ,'like', 1)->get();
        $usuarios = Usuario::where('idRol' ,'Not like', 3)->get();


        //retorna recursos
        return view('empleado.index', compact('eps'),compact('usuarios'))->with("empleados", $empleados);
    }

    public function create()
    {
        $usuarios = Usuario::where('idRol' ,'Not like', 3)->get();
        $eps = EPS::where('Estado' ,'like', 1)->get();
        return view('empleado.create',  compact('eps'), compact('usuarios'));
    }

    public function store(Request $request)
    {
        //Proceso para validar datos (laravel)
        //1. Establecer la reglas de validacion en un arreglo
        $reglas=[
            "CodEmp" => 'required|max:20',
            "Nombre" => 'required|alpha|max:50',
            "Apellido" => 'required|alpha|max:50',
            "TipDoc" => 'required',
            "Cedula" => 'unique:App\Empleado,cedula|required|alpha_num|max:20',
            "Tel" => 'required|alpha_num|max:10',
            "Correo" => 'required|email',
            "Dirección" => 'required|max:50',
            "IdUsuario" => 'required',
            "IdEPS" => 'required',
        ];

        //1.1. Establecer mensajes de validacion
        $mensajes=[
            "required" => "Campo requerido",
            "alpha" => "Solo letras",
            "alpha_num" => "Solo numeros",
            "email" => "Debe ser un email",
            "max" => "Debe tener máximo :max caracteres",
            "unique" => "Documento ya registrado"
        ];



        //2. Crear el objeto epecial para validacion
        $validador = Validator::make($request->all(), $reglas, $mensajes);

        //3. realizar la validacion utilizando el validador(fails)
        if($validador->fails())//True por que falla
        {
            //zona de fallo
            return redirect('empleado/create')
            ->withErrors($validador)
            ->withInput();
        }

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
        $usuario = Usuario::where('idUsuario' ,'=', $id)->get();//Error no selecciona el id del usuario sino que hace la consulta con el id del empleado
        $eps = EPS::where('Estado' ,'like', 1)->get();

        return view('empleado.show', compact('usuario'), compact('eps'))->with("empleado", $empleado);
    }

    public function edit($id)
    {
        //Seleccionar el recurso (singleton) con el id del parametro
        $empleado = Empleado::find($id);
        $eps = EPS::where('Estado' ,'like', 1)->get();
        $usuarios = Usuario::where('idRol' ,'Not like', 3)->get();


        //Pasar ese cliente a la vista para presentarse en el formulario
        return view('empleado.edit', compact('eps'), compact('usuarios'))->with('empleado', $empleado);
    }

    public function update(Request $request, $id)
    {

        //Proceso para validar datos (laravel)
        //1. Establecer la reglas de validacion en un arreglo
        $reglas=[
            "CodEmp" => 'required|max:20',
            "Nombre" => 'required|max:50',
            "Apellido" => 'required|max:50',
            "TipDoc" => 'required',
            "Cedula" => 'required|alpha_num|max:20',
            "Tel" => 'required|alpha_num|max:10',
            "Correo" => 'required|email',
            "Dirección" => 'required|max:50',
            "IdUsuario" => 'required',
            "IdEPS" => 'required',
        ];

        //1.1. Establecer mensajes de validacion
        $mensajes=[
            "required" => "Campo requerido",
            "alpha" => "Solo letras",
            "alpha_num" => "Solo numeros",
            "email" => "Debe ser un email",
            "max" => "Debe tener máximo :max caracteres"
        ];



        //2. Crear el objeto epecial para validacion
        $validador = Validator::make($request->all(), $reglas, $mensajes);

        //3. realizar la validacion utilizando el validador(fails)
        if($validador->fails())//True por que falla
        {
            //zona de fallo
            return redirect("empleado/$id/edit")
            ->withErrors($validador)
            ->withInput();
        }
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
        //
    }

    public function estado($id)
    {
        //1. Establcer el estado del usuario (null, 1=activo, 2=inactivo, 0=null)
        $empleado = Empleado::find($id);
        switch ($empleado->estado)
        {
            case null:$empleado->estado = 1;
                      $empleado->save();
                      $mensaje =  "Estado activo asiganado al empleado: $empleado->nombres $empleado->apellidos";
                      break;

            case 1:$empleado->estado = 2;
                      $empleado->save();
                      $mensaje =  "Estado inactivo asiganado al empleado: $empleado->nombres $empleado->apellidos";
                      break;

            case 2: $empleado->estado = 1;
                      $mensaje = "Estado actio asignado al empleado: $empleado->nombres $empleado->apellidos";
                      $empleado->save();
                      break;

        }
        //redireccionar a la ruta por defecto (index 'empleado')
        //con un mesaje de exito
        return redirect('empleado')->with('mensaje_exito', $mensaje);
    }
}
