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
<h2>DNI: </h2><p>{{$estudiante->user->dni}}</p>
	{{
	$estudiante->escuela->facultad->facultad
	}}

@endsection