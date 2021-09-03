<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <br>
    <div class="container">
        <h1 style="text-align: center"><strong>LOGIN</strong></h1>
        <form method="POST" action="{{url('login')}}">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="email" name="email" >
              <strong class="text-danger" style="text-align: center"> {{ $errors->first('email') }} </strong>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="password" name="password">
              <strong class="text-danger" style="text-align: center"> {{ $errors->first('password') }} </strong>

            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block" style="text-align: center">Ingresar</button>

            @if (session("credenciales_invalidas"))
            <div class="alert alert-danger" style="text-align: center">
                <strong>{{ session("credenciales_invalidas") }}</strong>
            </div>
            @endif
            @if (session("mesaje_salir"))
                <div class="alert alert-success" style="text-align: center">
                    <strong>{{ session("mesaje_salir") }}</strong>
                </div>
            @endif

        </form>
    </div>
</body>
</html>
