<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>LA ROC@</title>
</head>

<body>
    <header>
        <div class="d-flex" id="content-wrapper">
            <!-- Sidebar -->
            <div id="sidebar-container" class="bg-primary">
                <div class="logo">
                    <h1 class="text-dark font-weight-bold"><strong> La Roc@</strong></h1>
                </div>
                <div id="menu1" class="menu">
                    <a  href="{{url('usuario')}}" class="d-block text-dark p-3" ><i class="icon ion-md-person mr-1 lead"></i>Usuario</a>
                    <a  href="{{url('eps') }}" class="d-block text-dark p-3" ><i class="icon ion-md-person mr-1 lead"></i>EPS</a>
                    <a  href="{{url('cliente') }}" class="d-block text-dark p-3" ><i class="icon ion-md-person mr-1 lead"></i>Cliente</a>
                    <a  href="categorias.html" class="d-block text-dark p-3" ><i class="icon ion-md-reorder mr-1 lead"></i>Categorias</a>
                    <a  href="#" class="d-block text-dark p-3" ><i class="icon ion-md-cart mr-1 lead"></i>Domicilios</a>
                </div>
            </div>
            <!-- Fin sidebar -->


            <div class="w-100 ">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span> </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <form class="form-inline d-inline-block my-1">
                                <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                                <button class="btn btn-search" type="submit"><i class="icon ion-md-search"></i></button>
                            </form>

                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                <a class="d-block text-dark p-3" ><i class="icon ion-md-person mr-4 lead"></i><strong>Andres Cepeda</strong></a>
                                <a href="index.html" class="d-block text-dark p-3 "><i class="icon ion-md-exit mr-4 lead avatar"></i><strong>Cerrar sesión</strong></a>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Modal Registrar -->
                <div class="container">
                    <div class="modal fade bd-example-modal-lg" id="registarEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="text-align: center;" id="tituloEmpleadoEPS">Registrar Empleado</h5>
                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-info">
                                        <form method="POST" action="{{ url('empleado') }}">
                                            @csrf
                                            <div class="form-group">
                                              <label for="CodCli">Codigo empleado:</label>
                                              <input value="{{ old('CodEmp') }}" type="text" class="form-control" id="CodEmp" name="CodEmp" placeholder="Codigo empleado">
                                              <strong class="text-danger"> {{ $errors->first('CodEmp') }} </strong>
                                            </div>

                                            <div class="form-row">
                                              <div class="form-group col-md-6">
                                                <label for="Nombre">Nombre:</label>
                                                <input value="{{ old('Nombre') }}" type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
                                                <strong class="text-danger"> {{ $errors->first('Nombre') }} </strong>
                                              </div>

                                              <div class="form-group col-md-6">
                                                <label for="Apellido">Apellido:</label>
                                                <input value="{{ old('Apellido') }}" type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Apellido">
                                                <strong class="text-danger"> {{ $errors->first('Apellido') }} </strong>
                                              </div>

                                            </div>

                                            <div class="form-row">

                                              <div class="form-group col-md-6">
                                              <label>Tipo de documento:</label>
                                                <select id="TipDoc" name="TipDoc" class="form-control" required>
                                                    <option >--Tipo documento--</option>
                                                    <option >C.C</option>
                                                    <option >C.E</option>
                                                    <option >T.I</option>
                                                    <option >Pasaporte</option>
                                                </select>
                                                <strong class="text-danger"> {{ $errors->first('TipDoc') }} </strong>
                                              </div>

                                              <div class="form-group col-md-6">
                                                <label for="Cedula">Cedula:</label>
                                                <input value="{{ old('Cedula') }}" type="number" class="form-control" id="Cedula" name="Cedula" placeholder="Cedula">
                                                <strong class="text-danger"> {{ $errors->first('Cedula') }} </strong>
                                              </div>

                                            </div>

                                            <div class="form-group">
                                              <label for="Tel">Telefono:</label>
                                              <input value="{{ old('Tel') }}" type="number" class="form-control" id="Tel" name="Tel" placeholder="Telefono">
                                              <strong class="text-danger"> {{ $errors->first('Tel') }} </strong>
                                            </div>

                                            <div class="form-group">
                                              <label for="Correo">Correo:</label>
                                              <input value="{{ old('Correo') }}" type="email" class="form-control" id="Correo" name="Correo" placeholder="Correo">
                                              <strong class="text-danger"> {{ $errors->first('Correo') }} </strong>
                                            </div>

                                            <div class="form-group">
                                              <label for="Dirección">Dirección:</label>
                                              <input value="{{ old('Dirección') }}" type="varchar" class="form-control" id="Dirección" name="Dirección" placeholder="Dirección">
                                              <strong class="text-danger"> {{ $errors->first('Dirección') }} </strong>
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="EstCli" name="EstCli" value="1" >
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label for="IdUsuario">Usuario:</label>
                                                <select name="IdUsuario" id="IdUsuario" class="form-control" required>
                                                    <option selected>--Escoja el usuario--</option>
                                                @foreach ($usuarios as $usuario)
                                                    <option value="{{$usuario->idUsuario}}">{{$usuario->usuario}}</option>
                                                @endforeach
                                                </select>
                                                <strong class="text-danger"> {{ $errors->first('IdUsuario') }} </strong>
                                                <!--<input type="number" class="form-control" id="IdUsuario" name="IdUsuario" placeholder="Id usuario">-->
                                            </div>

                                                <div class="form-group col-md-6">
                                                    <label for="IdEPS">EPS:</label>
                                                    <select name="IdEPS" id="IdEPS" class="form-control" required>
                                                        <option selected>--Escoja la EPS--</option>
                                                    @foreach ( $eps as $eps )
                                                        <option value="{{$eps->idEPS}}">{{$eps->NombreEPS}}</option>
                                                    @endforeach
                                                    </select>
                                                    <strong class="text-danger"> {{ $errors->first('IdEPS') }} </strong>
                                                    <!--<input type="number" class="form-control" id="IdEPS" name="IdEPS" placeholder="Id EPS"-->
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Actualizar -->
                <div class="container">
                    <div class="modal fade bd-example-modal-lg" id="ActualizarEPSModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="text-align: center;" id="tituloActualizarEPS">Actualizar EPS</h5>
                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-info">
                                        <form id="ActualizarEPS"  method="POST" action="{{ url('cliente') }}">
                                            @csrf

                                            <div class="form-group ">
                                                <label for="NEPS">Nombre EPS:</label>
                                                <input type="text" class="form-control" id="NEPS_edit" name="NEPS_edit" placeholder="Nombre EPS">
                                            </div>

                                            <label>Estado:</label>
                                            <p>0 = Incativo</p>
                                            <p>1 = Activo</p>
                                            <select name="txtEst_edit" id="txtEst_edit" required class="form-control" disabled>
                                                <option>0</option>
                                                <option selected>1</option>
                                            </select>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="hidden" class="form-control" id="EstEPS" name="EstEPS" value="1" >
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary" >Actualizar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="content">
                    <section class="py-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 style="color: #000000;" class="font-weight-bold mb-0"><strong> Bienvenido Andres</strong></h1>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h1 style="text-align: center; color: #000;"><strong><h3>Empleados</h3></strong></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="{{ url('empleado/create') }}" ><i class="icon ion-md-contacts mr-2 lead"></i><strong>Nuevo empleado</strong></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @if (session("mensaje_exito"))
                                                <div class="alert alert-success">
                                                    <strong>{{ session("mensaje_exito") }}</strong>
                                                </div>
                                            @endif
                                            @if (session("mensaje_exito1"))
                                                <div class="alert alert-info">
                                                    <strong>{{ session("mensaje_exito1") }}</strong>
                                                </div>
                                            @endif
                                            <table id="empleado" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr style="text-align: center">
                                                        <th><strong>Nombre </strong></th>
                                                        <th><strong>Cedula</strong></th>
                                                        <th><strong>Tel</strong></th>
                                                        <th><strong>Email</strong></th>
                                                        <th><strong>Editar</strong></th>
                                                        <th><strong>Estado</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $empleados as $empleado )

                                                        <tr class="table-Light" style="text-align: center">
                                                            <td><a href="{{url('empleado/'.$empleado->idEmp) }}">{{$empleado->nombres}} {{$empleado->apellidos}}</a></td>

                                                            <td> {{$empleado->cedula}}</td>
                                                            <td> {{$empleado->tel}}</td>
                                                            <td> {{$empleado->email}}</td>

                                                            <td><a href="{{url('empleado/'.$empleado->idEmp.'/edit') }}" type="button" class="btn btn-success"><i class="icon ion-md-create"></i></a></td>
                                                            <td>
                                                                @switch ($empleado->estado)
                                                                    @case(null)
                                                                        <strong class="alert-info">empleado sin estado
                                                                            <a href="{{ url('empleado/'.$empleado->idEmp .'/estado') }}">
                                                                                Asignar estado
                                                                            </a>
                                                                        </strong>
                                                                    @break
                                                                    @case(1)
                                                                        <a href="{{ url('empleado/'.$empleado->idEmp .'/estado') }}" type="button" class="btn btn-danger">Inhabilitar </a>
                                                                    @break

                                                                    @case(2)
                                                                        <a href="{{ url('empleado/'.$empleado->idEmp .'/estado') }}"type="button" class="btn btn-success">Habilitar </a>
                                                                    @break
                                                                @endswitch
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                </tbody>
                                              </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <footer class="py-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 style="text-align: center; color: #000;">CONTACTENOS</h4>
                                        <a style="text-align: center;" href="mailto:laroca.64@hotmail.com" class="d-block text-dark p-3" ><i class="icon ion-md-mail  mr-2 lead"></i>Enviar correo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </header>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script src=" {{asset('js/empleado.js')}}"></script>
</body>
</html>




