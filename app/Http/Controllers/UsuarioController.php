<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function list()
    {
        $usuarios = DB::table('usuario')->get();

       return view('usuario.ConsultarUsuarios', compact('usuarios'));
    }

    public function info($idUsuario)
    {
        $usuario = DB::table('usuario')->where('idUsuario', $idUsuario)->first();

        return get_object_vars($usuario);

        //return view('usuario.ConsultarUsuario', compact('usuario'));
    }

    public function add (Request $request)
    {
        $IsertarUsuario['idRol'] = $request->input('Rol');
        $IsertarUsuario['usuario'] = $request->input('Usuario');
        $IsertarUsuario['clave'] = $request->input('Clave');

        DB::table('usuario')->insert($IsertarUsuario);

        echo "Registro realizado con exito!";
    }

    public function edit (Request $request)
    {
        //print_r($request->all());

        $ActualizarUsuario['idRol'] = $request->input('Rol_edit');
        $ActualizarUsuario['usuario'] = $request->input('Usuario_edit');
        $ActualizarUsuario['clave'] = $request->input('Clave_edit');

        DB::table('usuario')->where('idUsuario',$request->input('idUsuario_edit'))->update($ActualizarUsuario);

        echo "Actualización realizada con exito!";
    }


}
