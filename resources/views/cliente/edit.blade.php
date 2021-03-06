<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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
                    <a  href="{{url('empleado') }}" class="d-block text-dark p-3" ><i class="icon ion-md-person mr-1 lead"></i>Empleado</a>
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
                                <a href="index.html" class="d-block text-dark p-3 "><i class="icon ion-md-exit mr-4 lead avatar"></i><strong>Cerrar sesi??n</strong></a>
                            </ul>
                        </div>
                    </div>
                </nav>

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
                                            <h1 style="text-align: center; color: #000;"><strong><h3>Actualizar cliente</h3></strong></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="{{ url('cliente/' . $cliente->idCli) }}">
                                                @method('PUT')
                                                @csrf
                                                <div class="form-group">
                                                  <label for="CodCli">Codigo cliente:</label>
                                                  <input value="{{$cliente->codCli}}" type="text" class="form-control" id="CodCli" name="CodCli" placeholder="Codigo cliente">
                                                  <strong class="text-danger"> {{ $errors->first('CodCli') }} </strong>
                                                </div>

                                                <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                    <label for="Nombre">Nombre:</label>
                                                    <input value="{{$cliente->nombres}}" type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
                                                    <strong class="text-danger"> {{ $errors->first('Nombre') }} </strong>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                    <label for="Apellido">Apellido:</label>
                                                    <input value="{{$cliente->apellidos}}" type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Apellido">
                                                    <strong class="text-danger"> {{ $errors->first('Apellido') }} </strong>
                                                  </div>

                                                </div>

                                                <div class="form-row">

                                                  <div class="form-group col-md-6">
                                                  <label>Tipo de documento:</label>
                                                    <select id="TipDoc" name="TipDoc" class="form-control" required>
                                                        <option selected>C.C</option>
                                                        <option >C.E</option>
                                                        <option >T.I</option>
                                                        <option >Pasaporte</option>
                                                    </select>
                                                    <strong class="text-danger"> {{ $errors->first('TipDoc') }} </strong>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                    <label for="Cedula">Cedula:</label>
                                                    <input value="{{$cliente->cedula}}" type="number" class="form-control" id="Cedula" name="Cedula" placeholder="Cedula" readonly>
                                                    <strong class="text-danger"> {{ $errors->first('Cedula') }} </strong>
                                                  </div>

                                                </div>

                                                <div class="form-group">
                                                  <label for="Tel">Telefono:</label>
                                                  <input value="{{$cliente->tel}}" type="number" class="form-control" id="Tel" name="Tel" placeholder="Telefono">
                                                  <strong class="text-danger"> {{ $errors->first('Tel') }} </strong>
                                                </div>

                                                <div class="form-group">
                                                  <label for="Correo">Correo:</label>
                                                  <input value="{{$cliente->email}}" type="email" class="form-control" id="Correo" name="Correo" placeholder="Correo">
                                                  <strong class="text-danger"> {{ $errors->first('Correo') }} </strong>
                                                </div>

                                                <div class="form-group">
                                                  <label for="Direcci??n">Direcci??n:</label>
                                                  <input value="{{$cliente->direccion}}" type="varchar" class="form-control" id="Direcci??n" name="Direcci??n" placeholder="Direcci??n">
                                                  <strong class="text-danger"> {{ $errors->first('Direcci??n') }} </strong>
                                                </div>

                                                <div class="form-group">
                                                    <input value="{{$cliente->estado}}" type="hidden" class="form-control" id="EstCli" name="EstCli" value="1" >
                                                </div>

                                                <div class="form-group ">
                                                    <label for="IdUsuario">Usuario:</label>
                                                    <select name="IdUsuario" id="IdUsuario" class="form-control"  required>
                                                        @foreach ($usuarios as $usuario)
                                                            <option value="{{$usuario->idUsuario}}"
                                                                @if ($usuario->idUsuario == $cliente->idUsuario)
                                                                    selected
                                                                @endif>{{$usuario->email}}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--<input value="" type="number" class="form-control" id="IdUsuario" name="IdUsuario" placeholder="Id usuario" readonly>-->
                                                    <strong class="text-danger"> {{ $errors->first('IdUsuario') }} </strong>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                                <td><a href="{{url('cliente') }}" type="button" class="btn btn-success">Atras</a></td>
                                            </form>
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
</body>
</html>



