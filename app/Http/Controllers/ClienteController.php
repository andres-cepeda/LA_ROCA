<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Usuario;

class ClienteController extends Controller

{

    public function index()
    {
        //seleccion de recursos
        $clientes = Cliente::where('Estado' ,'like', 1)->get();
        $usuarios = Usuario::where('idRol' ,'like', 3)->get();
        //retorna recursos
        return view('cliente.index',compact('usuarios'))->with("clientes", $clientes);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
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

        return view('cliente.show')->with("cliente", $cliente);
    }

    public function edit($id)
    {
        //Seleccionar el recurso (singleton) con el id del parametro
        $cliente = Cliente::find($id);

        //Pasar ese cliente a la vista para presentarse en el formulario
        return view('cliente.edit')->with('cliente', $cliente);
    }


    public function update(Request $request, $id)
    {
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
}
