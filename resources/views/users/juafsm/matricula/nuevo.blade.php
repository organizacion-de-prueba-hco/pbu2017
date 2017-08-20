@extends('master.juafsm')
@section('activacion')
	<?php
$oa = '';
$nbecas='';
$enc='';
$in='active';
?>
@endsection
@section('title','Nueva Matricula')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-comment"></i>	
	<li class="active">Nuevo</li>
</ul>
@endsection
@section('contenido')
@if($estudiante)
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
								<br>
{!! Form::open(['route' =>'jufsmatricula.store', 'method' => 'POST','class'=>'form-horizontal']) !!}
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
	<hr>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> </label>
		<div class="col-sm-9">
			<label><b>Datos del Taller</b></label>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Pariente </label>
		<div class="col-sm-9">
			<select class="col-xs-10 col-sm-5" name="curso_taller_id" required="required">
				<option value="">Seleccione una opción</option>
		        @foreach($talleres as $t)
		        	<?php 
		        				$sensor='0';
		        		foreach ($mistalleres as $mt) {
		        			if ($mt->curso_taller_id==$t->id) {
		        				$sensor='1';
		        				break;
		        			}
		        		
		        		}
		        		if ($sensor=='1') {
		        			continue;
		        		}

		        	?>
		        <option value="{{$t->id_ct}}">{{$t->taller}}</option>
		        @endforeach
        	</select>
		</div>
	</div>

	<div class="form-group" >
		<div class="col-sm-6">
			<input type='hidden' value="{{$estudiante->user_id}}" name="estudiante">
				<button type="submit" class="width-35 pull-right btn btn-sm btn-primary col-xs-10 col-sm-5">
				<i class="ace-icon fa fa-plus" ></i>
				<span class="bigger-110">Registrar </span>
			</button>
		</div>
	</div>
{!! Form::close() !!}
</div><!-- PAGE CONTENT ENDS -->
@else
	<h3>¡Error! <span> El Código ingresado no existe</span></h3><a href="{{url('jufsmatricula')}}">volver</a>
@endif
@endsection
@section('script')


@endsection