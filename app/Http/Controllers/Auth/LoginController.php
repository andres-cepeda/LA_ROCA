<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //Mostrar el formulario de login
    public function form(){
        return view('auth.login');
    }

    //Logear y redireccion en caso positivo a la ruta que se elija
    public function login(Request $request){
        //Auth: Establecer inicios de sesion
        if(Auth::attempt($request->only(['email', 'password']))){
            return redirect('usuario')
            ->with("mensaje_exito" , "Usuario autenticado exitosamente");
        }
        else
        {
            return redirect('login')
            ->with("credenciales_invalidas" , "Datos incorrectos verifique y reintente");
        }
    }

    //Cerrar sesion
    public function logout()
    {
        Auth::logout();
        return redirect('login')->with("mesaje_salir" , "Sesión cerrada correctamente");
    }

}
