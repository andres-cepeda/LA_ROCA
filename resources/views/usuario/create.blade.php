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
            <a  href="{{url('eps')}}" class="d-block text-dark p-3" ><i class="icon ion-md-person mr-1 lead"></i>EPS</a>
            <a  href="{{url('empleado') }}" class="d-block text-dark p-3" ><i class="icon ion-md-person mr-1 lead"></i>Empleado</a>
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
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <form class="form-inline d-inline-block my-1">
                <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-search" type="submit"><i class="icon ion-md-search"></i></button>
              </form>

              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <a class="d-block text-dark p-3" ><i class="icon ion-md-person mr-4 lead"></i><strong>{{ Auth::user()->email}}</strong></a>
                <a href="{{url('logout')}}" class="d-block text-dark p-3 "><i class="icon ion-md-exit mr-4 lead avatar"></i><strong>Cerrar sesión</strong></a>
              </ul>
            </div>
          </div>
        </nav>

        <div id="content">

          <section>
              <div class="container">
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <h1 style="text-align: center; color: #000;"><strong><h3>Usuarios</h3></strong></h1>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="NuevoUsuario" method="POST" action="{{ url('usuario') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="idUsuario" >
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="IdUsuario">Rol:</label>
                                                <select name="Rol" id="Rol" class="form-control" required>
                                                    <option selected>--Escoja el rol--</option>
                                                    @foreach ($rols as $rol)
                                                        <option value="{{$rol->idRol }}">{{$rol->NombreRol}}</option>
                                                    @endforeach
                                                </select>
                                                <strong class="text-danger"> {{ $errors->first('Rol') }} </strong>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="Usuario">Usuario:</label>
                                                <input value="{{ old('Usuario') }}" type="text" class="form-control" id="Usuario" name="Usuario" placeholder="Usuario" >
                                                <strong class="text-danger"> {{ $errors->first('Usuario') }} </strong>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="Clave">Clave:</label>
                                          <input type="password" class="form-control" id="Clave" name="Clave" placeholder="Clave">
                                          <strong class="text-danger"> {{ $errors->first('Clave') }} </strong>
                                        </div>

                                        <div class="form-group">
                                            <label for="Clave_confirmation">Clave confirmacion:</label>
                                            <input type="password" class="form-control" id="Clave_confirmation" name="Clave_confirmation" placeholder="Clave">
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="estado" name="estado" value="1" >
                                        </div>

                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                        <a href="{{url('usuario') }}" type="button" class="btn btn-success">Atras</a>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

</body>
</html>



