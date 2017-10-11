@extends('master.psico')
@section('activacion')
<?php  
		$i ='';
		$ii='';
		$iii='';
		$iv='active';
	?>
@endsection
@section('titulo','Actualizar registro')
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
	<i class="ace-icon fa fa-heartbeat"></i>
	<li class="active">Otros</li>
	<li class="active">Actualizar</li>
</ul>
@endsection
@section('contenido')
@if($estudiante)
<div class="hr dotted"></div>

<?php
    $estadoBoton = '';
    $mensajeCabecera='';

?>

<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<h3 style="color: red; margin-left: 10em; padding-bottom: 5px;">{{$mensajeCabecera}}</h3>
								
								{!! Form::open(['route' => ['psicotro.update',$otro->id], 'method' => 'PUT', 'class'=>'form-horizontal']) !!}
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
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Domicilio Actual:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('domicilio', $estudiante->user->domicilio, ['class'=> 'col-xs-10 col-sm-5', 'placeholder'=>'Nombre de la calle, Av. Jr, etc'])!!}
											</div>
											<div class="clearfix">
												{!!Form::text('n_domicilio', $estudiante->user->n_domicilio, ['required','class'=> 'col-xs-10 col-sm-5', 'placeholder'=>'Número, Lt., Mz., etc','style'=>'margin-top: 2px;'])!!}
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Telf./Cel. </label>
										<div class="col-sm-9">
											<input name="telefono" type="text" placeholder="N° Telf./Cel" class="col-xs-10 col-sm-5" required="true" value="{{$estudiante->user->telefono}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Fecha Nacimiento </label>
										<div class="col-sm-9">
										<input type="date" name="f_nac" value="{{$estudiante->user->f_nac}}">
										</div>
									</div>
									<hr>
									 
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Test de Inteligencia</label>
										<div class="col-sm-9">
										{!!Form::textarea('t_inteligencia',$otro->t_inteligencia, ['required','id'=>'obs','class'=>'col-xs-10 col-sm-5','placeholder' => 'Escribir aquí...'])!!}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Test de Ansiedad</label>
										<div class="col-sm-9">
										{!!Form::textarea('t_ansiedad',$otro->t_ansiedad, ['required','id'=>'obs','class'=>'col-xs-10 col-sm-5','placeholder' => 'Escribir aquí...'])!!}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Test de Personalidad</label>
										<div class="col-sm-9">
										{!!Form::textarea('t_personalidad',$otro->t_personalidad, ['required','id'=>'obs','class'=>'col-xs-10 col-sm-5','placeholder' => 'Escribir aquí...'])!!}
										</div>
									</div>

									<div class="form-group" >
										<div class="col-sm-6">
											<input type='hidden' value="{{$estudiante->user_id}}" name="user_id">
											<button type="submit" class="width-35 pull-right btn btn-sm btn-primary col-xs-10 col-sm-5" {{$estadoBoton}}>
											<i class="ace-icon fa fa-plus" ></i>
											<span class="bigger-110">Actualizar </span>
											</button>
										</div>
									</div>
			                    {!! Form::close() !!}


								</div><!-- PAGE CONTENT ENDS -->

@else
	<h3>¡Error! <span> El Código ingresado no existe</span></h3><a href="{{url('psicotros')}}">volver</a>
@endif


@endsection