@extends('templates.template');
@section('Contenido')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

    <h1>Listado de Producttos</h1>
    <table id="Producto" class="table tabe-hover">
        <tbody>
            @foreach ($Productos as $Producto )
                @if($Producto->estado==1)

                        <tr>
                            <td><img class=" img-fluid prod mr-5" src="{{  asset('imagen/' . $Producto->urlImagen ) }}" alt="" width="200 rem"></td>
                            <td>
                                {{ $Producto->codProd }}
                                <br>
                                <br>
                                {{ $Producto->nombre }}
                                <br>
                                <br>
                                {{ $Producto->valor }}
                                <br>
                                <br>
                                <a href="{{ url('Productos/'.$Producto->idProd ) }}">Ver detalles...</a>
                                <br>
                                <br>
                                <a href="{{ url('Productos/'.$Producto->idProd.'/##' ) }}"><button class="btn btn-primary w-50 ">Agregar al carrito</button></a>
                            </td>
                        </tr>

                @endif
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('js/Productos.js') }}"></script>

@endsection
