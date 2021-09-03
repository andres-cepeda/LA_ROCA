@extends('templates.template');
@section('Contenido');
<h1>
    Categoria: {{ $Categoria->NombreCat }}
</h1>
<ul>
    <li><strong>Nombre:</strong> {{ $Categoria->NombreCat }} </li>
    <li><strong>Estado:</strong> {{ $Categoria->estado }} </li>
</ul>
@endsection
