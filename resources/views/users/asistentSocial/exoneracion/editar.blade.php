@extends('master.servicioSocial')
@section('activacion')
	<?php  
		$a='';$rcMenu=''; $b=''; $c1=''; $c2='';$c='';$c3=''; $c4='';$d='';$d1=''; $d2=''; $d3=''; $d4='';$e='active';
	?>
@endsection
@section('title','Exoneración')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-medkit"></i>	
	<li class="active">Exoneración de pago para atención en el centro médico UNHEVAL</li>
	<li class="active">editar</li>
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

								{!! Form::model($exon,['route' =>['asexpagocentmed.update',$exon->id], 'method' => 'PUT', 'class'=>'form-horizontal']) !!}
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
												{!!Form::text('domicilio', $estudiante->user->domicilio, ['required','class'=> 'col-xs-10 col-sm-5', 'placeholder'=>'Nombre de la calle, Av. Jr, etc'])!!}
											</div>
											<div class="clearfix">
												{!!Form::text('n_domicilio', $estudiante->user->n_domicilio, ['required','class'=> 'col-xs-10 col-sm-5', 'placeholder'=>'Número, Lt., Mz., etc','style'=>'margin-top: 2px;'])!!}
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Telf./Cel. </label>
										<div class="col-sm-9">
											<input type="text" name="telefono" placeholder="N° cel" class="col-xs-10 col-sm-5" required="true" value="{{$estudiante->user->telefono}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Fecha Nacimiento </label>
										<div class="col-sm-9">
										<input type="date" name="f_nac" value="{{$estudiante->user->f_nac}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Opinión </label>
										<div class="col-sm-9">
										{!!Form::textArea('opinion',null,['required','id'=>'opinion','class'=>'col-xs-10 col-sm-5','rows'=>'5','placeholder' => 'Escriba su opinión aquí...'])!!}
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