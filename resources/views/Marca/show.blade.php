@extends('templates.template');
@section('Contenido');
<h1>
    Marca: {{ $Marca->NombreMar }}
</h1>
<ul>
    <li><strong>Nombre:</strong> {{ $Marca->NombreMar }} </li>
    <li><strong>Estado:</strong> {{ $Marca->estado }} </li>
</ul>
@endsection
