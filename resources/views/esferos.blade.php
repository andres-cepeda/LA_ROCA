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
    <link rel="stylesheet" href="css/style.css">

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

          <div class="w-100 ">
            <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <div class="container">
            <div class="logo">
              <a href="index.html" class="d-block text-dark p-3" ><strong><h1>La Roc@</h1></strong></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <ul class="navbar-nav">
                <a href="#" class="d-block text-dark p-3" ><i class="icon ion-md-reorder mr-2 lead"></i><strong>Categorias</strong></a>
              </ul>

              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <a data-toggle="modal" data-target="#registarModal" class="d-block text-dark p-3 "><i class="icon ion-md-contacts mr-2 lead"></i><strong>Registar</strong></a>
                <a  data-toggle="modal" data-target="#loginModal" class="d-block text-dark p-3" ><i class="icon ion-md-person mr-2 lead"></i><strong>Iniciar sesión</strong></a>
              </ul>

              <form class="form-inline d-inline-block my-1">
                <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-search" type="submit"><i class="icon ion-md-search"></i></button>
              </form>

            </div>
          </div>
        </nav>

        <!-- Modal login -->
        <div class="container">
          <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="tituloLogin" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                <div class="modal-header">
                  <h5 style="text-align: center;" id="tituloLogin">INICIAR SESIÓN</h5>
                  <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="alert alert-info">
                    <form action="categorias.html" method="POST">

                      <div class="form-group">
                        <label for="usuario">Correo:</label>
                        <input type="email" class="form-control" id="usuario" placeholder="Ingrese el correo" required autofocus>
                      </div>

                      <div class="form-group">
                        <label for="clave">Contraseña:</label>
                        <input type="password" class="form-control" id="clave" placeholder="Ingrese la contraseña" required>
                      </div>

                      <button type="submit" class="btn btn-primary" onclick="validacion()">Ingresar</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Registrar -->
        <div class="container">
          <div class="modal fade bd-example-modal-lg" id="registarModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                <div class="modal-header">
                  <h5 style="text-align: center;" id="tituloRegistrar">Registrar usuario</h5>
                  <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="alert alert-info">
                    <form>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="Nombre">Nombre:</label>
                          <input type="text" class="form-control" id="Nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="Apellido">Apellido:</label>
                          <input type="text" class="form-control" id="Apellido" placeholder="Apellido">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Cedula">Cedula:</label>
                        <input type="number" class="form-control" id="Cedula" placeholder="Cedula">
                      </div>
                      <div class="form-group">
                        <label for="Celular">Celular:</label>
                        <input type="number" class="form-control" id="Celular" placeholder="Celular">
                      </div>
                      <div class="form-group">
                        <label for="Correo">Correo:</label>
                        <input type="email" class="form-control" id="Correo" placeholder="Correo">
                      </div>
                      <div class="form-group">
                        <label for="Dirección">Dirección:</label>
                        <input type="varchar" class="form-control" id="Dirección" placeholder="Dirección">
                      </div>

                      <button type="submit" class="btn btn-primary" onclick="registrar()">Registrar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div id="content">

          <section>
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <h1 style="text-align: center;"><strong><h1>Esferos</h1></strong></h1>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 ">
                      <img src="img/esfero.jpg" class=" img-fluid prod mr-4" alt="">
                    </div>
                    <div class="col-lg-9">
                      <h1><strong>Esfero Offi-Esco SEMI GEL 0.7</strong></h1>
                      <h4><strong>Valor unidad:</strong> $700 </h4>
                      <br>
                      <h6><strong>NOTA:</strong>Para poder solicitar productos por favor inicie sesión</h6>
                      <button data-toggle="modal" data-target="#loginModal" class="btn btn-primary w-100 align-self-center">Agregar al carrito</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 ">
                      <img src="img/esfero.jpg" class=" img-fluid prod mr-4" alt="">
                    </div>
                    <div class="col-lg-9">
                      <h1><strong>Esfero Offi-Esco SEMI GEL 0.7</strong></h1>
                      <h4><strong>Valor unidad:</strong> $700 </h4>
                      <br>
                      <h6><strong>NOTA:</strong>Para poder solicitar productos por favor inicie sesión</h6>
                      <button data-toggle="modal" data-target="#loginModal" class="btn btn-primary w-100 align-self-center">Agregar al carrito</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 ">
                      <img src="img/esfero.jpg" class=" img-fluid prod mr-4" alt="">
                    </div>
                    <div class="col-lg-9">
                      <h1><strong>Esfero Offi-Esco SEMI GEL 0.7</strong></h1>
                      <h4><strong>Valor unidad:</strong> $700 </h4>
                      <br>
                      <h6><strong>NOTA:</strong>Para poder solicitar productos por favor inicie sesión</h6>
                      <button data-toggle="modal" data-target="#loginModal" class="btn btn-primary w-100 align-self-center">Agregar al carrito</button>
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
                      <h4 style="text-align: center;">CONTACTENOS</h4>
                    <a style="text-align: center;" href="mailto:laroca.64@hotmail.com" class="d-block text-dark p-3" ><i class="icon ion-md-mail  mr-2 lead"></i>Enviar correo</a>
                    </div>
                  </div>
                </div>
              </div>
          </footer>
          <br>

        </div>

      </div>
    </div>
  </header>
</body>
<script>
  function registrar()
  {
    alert("!Usuario registrado¡");
  }

  function validacion()
  {
      var username = document.getElementById("usuario").value;
      var password = document.getElementById("clave").value;;

      if (username == "anfez2003@gmail.com" && password == "1456789")
      {
        location.href = 'productos.html'
      }
      else
      {
        alert("Error, verifique datos y reintente ")
      }
  }
</script>
</html>
