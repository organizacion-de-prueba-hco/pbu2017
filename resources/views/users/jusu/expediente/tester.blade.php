@extends('master.jusu')
@section('activacion')
	<?php
		$oa='active';$a=''; $b='';$c=''; $c1='';$c2='';$c3='';$c4='';$d=''; $d1=''; $d2=''; $d3=''; $d4='';$e='';
	?>
@endsection
@section('titulo','Tester')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-list-alt"></i>	
	<li class="active">Tester</li>
</ul>
@endsection
@section('contenido')
<h3>DNI: </h3><p>{{$estudiante->user->dni}}</p>
<h3>Nombre: </h3>{{$estudiante->user->nombres}}
<h3>Apellido Paterno: </h3>{{$estudiante->user->apellido_paterno}}
<h3>Apellido Materno: </h3>{{$estudiante->user->apellido_materno}}
<h3>Facultad: </h3>{{$estudiante->escuela->facultad->facultad}}
<h3>Escuela: </h3>{{$estudiante->escuela->escuela}}
<h3>Estado: Apta </h3>
<button>Más Detalles</button>

@endsection