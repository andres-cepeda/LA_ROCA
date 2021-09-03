<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Cliente;
use App\Usuario;

class ClienteController extends Controller

{
    public function __construct()
    {
        $this->middleware('miautenticacion');
    }

    public function index()
    {
        //seleccion de recursos
        $clientes = Cliente::all();
        $usuarios = Usuario::where('idRol' ,'like', 3)->get();
        //retorna recursos
        return view('cliente.index')->with("clientes", $clientes)
                                    ->with("usuarios", $usuarios);
    }

    public function create()
    {
        $usuarios = Usuario::where('idRol' ,'like', 3)->get();
        return view('cliente.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        //Proceso para validar datos (laravel)
        //1. Establecer la reglas de validacion en un arreglo
        $reglas=[
            "CodCli" => 'required|max:20',
            "Nombre" => 'required|alpha|max:50',
            "Apellido" => 'required|alpha|max:50',
            "TipDoc" => 'required',
            "Cedula" => 'unique:App\Cliente,cedula|required|alpha_num|max:20',
            "Tel" => 'required|alpha_num|max:10',
            "Correo" => 'required|email',
            "Dirección" => 'required|max:50',
            "IdUsuario" => 'required',

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
            return redirect('cliente/create')
            ->withErrors($validador)
            ->withInput();
        }


        //Traer el maxio Id que este en la tabla cliente
        $maxCli = Cliente::all()->max('idCli');
        $maxCli++;
        //Crear el nuevo recurso
        $nuevoCli = new Cliente();
        $nuevoCli->idCli = $maxCli;
        $nuevoCli->codCli = $request->input("CodCli");
        $nuevoCli->nombres = $request->input("Nombre");
        $nuevoCli->apellidos = $request->input("Apellido");
        $nuevoCli->tipoDoc = $request->input("TipDoc");
        $nuevoCli->cedula = $request->input("Cedula");
        $nuevoCli->tel = $request->input("Tel");
        $nuevoCli->email = $request->input("Correo");
        $nuevoCli->direccion = $request->input("Dirección");
        $nuevoCli->estado = $request->input("EstCli");
        $nuevoCli->idUsuario = $request->input("IdUsuario");

        $nuevoCli->save();
        return redirect('cliente')
        ->with("mensaje_exito" , "Cliente registrado exitosamente");
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        if ($cliente->estado==1) {
            $cliente->estado='Activo';
        }else if ($cliente->estado==2) {
            $cliente->estado='Inactivo';
        }

        $usuario=DB::select('select email from usuario WHERE idUsuario = ?', [$cliente->idUsuario ]);
        $cliente->idUsuario =$usuario[0]->email;

        return view('cliente.show')->with("cliente", $cliente);
    }

    public function edit($id)
    {
        //Seleccionar el recurso (singleton) con el id del parametro
        $cliente = Cliente::find($id);
        $usuarios = Usuario::where('idRol' ,'like', 3)->get();


        //Pasar ese cliente a la vista para presentarse en el formulario
        return view('cliente.edit')->with('cliente', $cliente)
                                   ->with("usuarios",$usuarios);
    }


    public function update(Request $request, $id)
    {
         //Proceso para validar datos (laravel)
        //1. Establecer la reglas de validacion en un arreglo
        $reglas=[
            "CodCli" => 'required|max:20',
            "Nombre" => 'required|alpha|max:50',
            "Apellido" => 'required|alpha|max:50',
            "TipDoc" => 'required',
            "Cedula" => 'required|alpha_num|max:20',
            "Tel" => 'required|alpha_num|max:10',
            "Correo" => 'required|email',
            "Dirección" => 'required|max:50',
            "IdUsuario" => 'required',

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
            return redirect("cliente/$id/edit")
            ->withErrors($validador)
            ->withInput();
        }

        //Seleccion del recurso a modificar
        $cliente = Cliente::find($id);

        //actualizo el estado del cliente
        //En virtud de los datos que vengan del formlario

        $cliente->codCli = $request->input("CodCli");
        $cliente->nombres = $request->input("Nombre");
        $cliente->apellidos = $request->input("Apellido");
        $cliente->tipoDoc = $request->input("TipDoc");
        $cliente->cedula = $request->input("Cedula");
        $cliente->tel = $request->input("Tel");
        $cliente->email = $request->input("Correo");
        $cliente->direccion = $request->input("Dirección");
        $cliente->estado = $request->input("EstCli");
        $cliente->idUsuario = $request->input("IdUsuario");
        $cliente->save();

        return redirect('cliente')
        ->with("mensaje_exito" , "Cliente actualizado exitosamente");
    }


    public function delete($id)
    {
        //Seleccionar el recurso (singleton) con el id del parametro
        $cliente = Cliente::find($id);

        //Pasar ese cliente a la vista para presentarse en el formulario
        return view('cliente.edit')->with('cliente', $cliente);
    }


    public function destroy($id)
    {
        //
    }
    public function estado($id)
    {
        //1. Establcer el estado del usuario (null, 1=activo, 2=inactivo, 0=null)
        $cliente = Cliente::find($id);
        switch ($cliente->estado)
        {
            case null:$cliente->estado = 1;
                      $cliente->save();
                      $mensaje =  "Estado activo asiganado al cliente: $cliente->nombres $cliente->apellidos";
                      break;

            case 1:$cliente->estado = 2;
                      $cliente->save();
                      $mensaje =  "Estado inactivo asiganado al cliente: $cliente->nombres $cliente->apellidos";
                      break;

            case 2: $cliente->estado = 1;
                      $mensaje = "Estado actio asignado al cliente: $cliente->nombres $cliente->apellidos";
                      $cliente->save();
                      break;

        }
        //redireccionar a la ruta por defecto (index 'cliente')
        //con un mesaje de exito
        return redirect('cliente')->with('mensaje_exito', $mensaje);
    }
}
