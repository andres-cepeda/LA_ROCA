<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Usuario;
use App\Rol;


class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('miautenticacion');
    }


    public function index()
    {
        //$usuarios = Usuario::where("estado","=",1)->get();
        $usuarios = Usuario::all();
        $rols = Rol::all();

        return view('usuario.index')->with("usuarios", $usuarios)
                                    ->with("rols",$rols);
    }


    public function create()
    {
        $rols = Rol::all();

        return view('usuario.create')->with("rols",$rols);
    }

    public function store(Request $request)
    {
        //Proceso para validar datos (laravel)
        //1. Establecer la reglas de validacion en un arreglo
        $reglas=[
            "Rol" => 'required|max:50',
            "Usuario" => 'unique:App\Usuario,email|required|email|max:50',
            "Clave" => 'required|max:255|confirmed',
        ];

        //1.1. Establecer mensajes de validacion
        $mensajes=[
            "required" => "Campo requerido",
            "email" => "Debe ser un email valido",
            "max" => "Debe tener máximo :max caracteres",
            "unique" => "Nombre de usuario ya registrado",
            "confirmed" => "La contraseña no coinside con la conformacion"
        ];

        //2. Crear el objeto epecial para validacion
        $validador = Validator::make($request->all(), $reglas, $mensajes);

        //3. realizar la validacion utilizando el validador(fails)
        if($validador->fails())//True por que falla
        {
            //zona de fallo
            return redirect('usuario/create')
            ->withErrors($validador)
            ->withInput();
        }

        //Traer el maxio Id que este en la tabla cliente
        $maxUsua = Usuario::all()->max('idUsuario');
        $maxUsua++;
        //Crear el nuevo recurso
        $nuevoUsua = new Usuario();
        $nuevoUsua->idUsuario = $maxUsua;
        $nuevoUsua->idRol = $request->input("Rol");
        $nuevoUsua->email = $request->input("Usuario");
        $nuevoUsua->password =  Hash::make($request->input("Clave"));
        $nuevoUsua->estado = $request->input("estado");
        $nuevoUsua->save();

        return redirect('usuario')
        ->with("mensaje_exito" , "Usuario registrada exitosamente");

    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
        $rol = Rol::all();

        return view('usuario.show')->with("usuario", $usuario)
                                   ->with("rol",$rol);
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);
        $rol = Rol::all();

        return view('usuario.edit')->with("usuario", $usuario)
                                   ->with("rol",$rol);
    }

    public function update(Request $request, $id)
    {
        //Proceso para validar datos (laravel)
        //1. Establecer la reglas de validacion en un arreglo
        $reglas=[
            "Rol" => 'required|max:50',
            "Usuario" => 'required|email|max:50',
            "Clave" => 'required|max:255|confirmed'
        ];

        //1.1. Establecer mensajes de validacion
        $mensajes=[
            "required" => "Campo requerido",
            "email" => "Debe ser un email valido",
            "max" => "Debe tener máximo :max caracteres",
            "unique" => "Nombre de usuario ya registrado",
            "confirmed" => "La contraseña no coinside con la conformacion"
        ];

        //2. Crear el objeto epecial para validacion
        $validador = Validator::make($request->all(), $reglas, $mensajes);

        //3. realizar la validacion utilizando el validador(fails)
        if($validador->fails())//True por que falla
        {
            //zona de fallo
            return redirect("usuario/$id/edit")
            ->withErrors($validador)
            ->withInput();
        }

        //Seleccion del recurso a modificar
        $usuario = Usuario::find($id);

        //actualizo el estado del cliente
        //En virtud de los datos que vengan del formlario
        $usuario->idRol = $request->input("Rol");
        $usuario->email = $request->input("Usuario");
        $usuario->password = Hash::make($request->input("Clave"));
        $usuario->estado = $request->input("estado");
        $usuario->save();
        return redirect('usuario')->with("mensaje_exito" , "Usuario actualizado exitosamente");
    }

    public function destroy($id)
    {
        //
    }
    public function estado($id)
    {
        //1. Establcer el estado del usuario (null, 1=activo, 2=inactivo, 0=null)
        $usuario = Usuario::find($id);
        switch ($usuario->estado)
        {
            case null:$usuario->estado = 1;
                      $usuario->save();
                      $mensaje =  "Estado activo asiganado al usuario: $usuario->usuario";
                      break;

            case 1:$usuario->estado = 2;
                      $usuario->save();
                      $mensaje =  "Estado inactivo asiganado al usuario: $usuario->usuario";
                      break;

            case 2: $usuario->estado = 1;
                      $mensaje = "Estado actio asignado al usuario: $usuario->usuario";
                      $usuario->save();
                      break;

        }
        //redireccionar a la ruta por defecto (index 'usuario')
        //con un mesaje de exito
        return redirect('usuario')->with('mensaje_exito', $mensaje);
    }
}
