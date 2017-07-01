@extends('master.jusu')
@section('activacion')
	<?php
$oa = 'active';
$a  = '';
$b  = '';
$c  = '';
$c1 = '';
$c2 = '';
$c3 = '';
$c4 = '';
$d  = '';
$d1 = '';
$d2 = '';
$d3 = '';
$d4 = '';
$e  = '';
?>
@endsection
@section('titulo','Editar Expediente')
@section('estilos')
	<style type="text/css">
		label{
			font-size: 14px;
			color: blue;
			font-weight: bold;
		}
		p{
			font-size: 15px;
		}
	</style>
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-list-alt"></i>
	<li class="active">Expediente</li>
	<li class="active">Nuevo</li>
</ul>
@endsection
@section('contenido')
@if($estudiante)
<div class="hr dotted"></div>

							<!-- PAGE CONTENT BEGINS -->
{!! Form::model($expediente,['route' => ['jusuexpediente.update', $expediente->expediente],'method' => 'PUT', 'class'=>'form-horizontal']) !!}
<div class="col-xs-12">	
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Código Universitario </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Código Universitario" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->cod_univ}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nombres </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->user->nombres}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Apellidos </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->user->apellido_paterno.' '.$estudiante->user->apellido_materno}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Facultad </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->escuela->facultad->facultad}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Escuela </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->escuela->escuela}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tipo de Beca </label>
										<div class="col-sm-9">
										{!!Form::select('TipoBeca',['A'=>'A','B'=>'B','C'=>'C'],$expediente->tipo_beca,['required','id'=>'beca','class'=>'col-xs-10 col-sm-5','placeholder' => 'Seleccione'])!!}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Estado </label>
										<div class="col-sm-9">
										{!!Form::select('estado',['1'=>'Aprobado','0'=>'Desaprobado'],$expediente->estado,['required','id'=>'beca','class'=>'col-xs-10 col-sm-5','placeholder' => 'Seleccione'])!!}
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-6">
											<input type='hidden' value="{{$estudiante->user_id}}" name="id_univ">
											<button type="submit" class="width-35 pull-right btn btn-sm btn-primary col-xs-10 col-sm-5">
											<i class="ace-icon fa  fa-pencil-square-o" ></i>
											<span class="bigger-110">Editar</span>
											</button>
										</div>										
									</div>
									
</div>
			                    {!! Form::close() !!}
								<!-- PAGE CONTENT ENDS -->

@else
	<h3>¡Error! <span> El Código ingresado no existe</span></h3><a href="{{url('jusuexpediente')}}">volver</a>
@endif


@endsection