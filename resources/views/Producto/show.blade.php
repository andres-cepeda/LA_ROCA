@extends('templates.template');
@section('Contenido');
<h1>
    Producto: {{ $Producto->nombre }}
</h1>
<ul>
    <li><strong>Codigo:</strong> {{ $Producto->codProd }} </li>
    <li><strong>Valor:</strong> {{ $Producto->valor }} </li>
    <li><strong>Stock:</strong> {{ $Producto->stock }} </li>
    <li><strong>Estado:</strong> {{ $Producto->estado }} </li>
    <li><strong>Categoria:</strong> {{ $Producto->idCat }} </li>
    <li><strong>Marca:</strong> {{ $Producto->idMar }} </li>
</ul>
<img src="{{  asset('imagen/' . $Producto->urlImagen ) }}" alt="" width="350 rem" >
@endsection
