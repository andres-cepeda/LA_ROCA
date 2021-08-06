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
                                            <h1 style="text-align: center; color: #000;"><strong><h3>Actualizar empleado</h3></strong></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="{{ url('empleado/' . $empleado->idEmp) }}">
                                                @method('PUT')
                                                @csrf
                                                <div class="form-group">
                                                  <label for="CodEmp">Codigo empleado:</label>
                                                  <input value="{{$empleado->codEmp}}" type="text" class="form-control" id="CodEmp" name="CodEmp" placeholder="Codigo cliente">
                                                </div>

                                                <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                    <label for="Nombre">Nombre:</label>
                                                    <input value="{{$empleado->nombres}}" type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                    <label for="Apellido">Apellido:</label>
                                                    <input value="{{$empleado->apellidos}}" type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Apellido">
                                                  </div>

                                                </div>

                                                <div class="form-row">

                                                  <div class="form-group col-md-6">
                                                  <label>Tipo de documento:</label>
                                                    <select value="{{$empleado->tipoDoc}}" id="TipDoc" name="TipDoc" class="form-control" required>
                                                        <option >C.C</option>
                                                        <option >C.E</option>
                                                        <option >T.I</option>
                                                        <option >Pasaporte</option>
                                                    </select>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                    <label for="Cedula">Cedula:</label>
                                                    <input value="{{$empleado->cedula}}" type="number" class="form-control" id="Cedula" name="Cedula" placeholder="Cedula">
                                                  </div>

                                                </div>

                                                <div class="form-group">
                                                  <label for="Tel">Telefono:</label>
                                                  <input value="{{$empleado->tel}}" type="number" class="form-control" id="Tel" name="Tel" placeholder="Telefono">
                                                </div>

                                                <div class="form-group">
                                                  <label for="Correo">Correo:</label>
                                                  <input value="{{$empleado->email}}" type="email" class="form-control" id="Correo" name="Correo" placeholder="Correo">
                                                </div>

                                                <div class="form-group">
                                                  <label for="Dirección">Dirección:</label>
                                                  <input value="{{$empleado->direccion}}" type="varchar" class="form-control" id="Dirección" name="Dirección" placeholder="Dirección">
                                                </div>

                                                <div class="form-group">
                                                    <input value="{{$empleado->estado}}" type="hidden" class="form-control" id="EstCli" name="EstCli" value="1" >
                                                </div>

                                                <div class="form-row">

                                                    <div class="form-group col-md-6">
                                                        <label for="IdUsuario">Id usuario:</label>
                                                        <input value="{{$empleado->idUsuario}}" type="number" class="form-control" id="IdUsuario" name="IdUsuario" placeholder="Id usuario" readonly>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="IdEPS">Id EPS:</label>
                                                        <input value="{{$empleado->idEPS}}" type="number" class="form-control" id="IdEPS" name="IdEPS" placeholder="Id EPS">
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                                <td><a href="{{url('empleado') }}" type="button" class="btn btn-success">Atras</a></td>
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



