@extends('master.servicioSocial')
@section('activacion')
	<?php  
		$a=''; $b='';$c=''; $c1='';$c2='';$c3='';$c4='';$d=''; $d1=''; $d2=''; $d3=''; $d4='';$e='active';
	?>
@endsection
@section('title','Exoneración')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-medkit"></i>	
	<li class="active">Exoneración de pago para atención en el centro médico UNHEVAL</li>
</ul>
@endsection
@section('contenido')
@if($estudiante)
<div class="hr dotted"></div>
<?php
if (App\ExoneracionPagoCentMed::where('id', $estudiante->user_id)->first()) {
    $mensajeCabecera= "¡El estudiante ya tiene un Expediente!";
    $estadoBoton = 'disabled';

} else {
    $estadoBoton = '';
    $mensajeCabecera='';
}

?>
<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<h3 style="color: red; margin-left: 10em; padding-bottom: 5px;">{{$mensajeCabecera}}</h3>
								{!! Form::open(['route' => 'asexpagocentmed.store', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Opinión </label>
										<div class="col-sm-9">
										{!!Form::textArea('opinion',null,['id'=>'opinion','class'=>'col-xs-10 col-sm-5','rows'=>'5','placeholder' => 'Escriba su opinión aquí...'])!!}
										</div>
									</div>

									<div class="form-group" >
										<div class="col-sm-6">
											<input type='hidden' value="{{$estudiante->user_id}}" name="id_univ">
											<button type="submit" class="width-35 pull-right btn btn-sm btn-primary col-xs-10 col-sm-5" {{$estadoBoton}}>
											<i class="ace-icon fa fa-plus" ></i>
											<span class="bigger-110">Registrar </span>
											</button>
										</div>
									</div>


			                    {!! Form::close() !!}


								</div><!-- PAGE CONTENT ENDS -->


@else
	<h3>¡Error! <span> El Código ingresado no existe</span></h3><a href="{{url('asexpagocentmed')}}">volver</a>
@endif
@endsection