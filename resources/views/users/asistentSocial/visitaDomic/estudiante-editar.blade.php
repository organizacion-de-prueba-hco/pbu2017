@extends('master.servicioSocial')
@section('activacion')
	<?php  
		$a='';$rcMenu=''; $b=''; $c='active open'; $c1='active'; $c2='';$c3=''; $c4='';$d='';$d1=''; $d2=''; $d3=''; $d4='';$e='';
	?>
@endsection
@section('titulo','Visita domicilaria')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-home"></i>	
	<li class="active">Visita Domiciliaria</li>
	<li class="active">Estudiante</li>
	<li>Editar</li>
</ul>
@endsection
@section('contenido')
@if($estudiante)

<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
								<br>
								{!! Form::model($vd,['route' => ['asvisitadomc1.update', $vd->id], 'method' => 'PUT', 'class'=>'form-horizontal']) !!}
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
										 <label><b>Datos de la visita</b></label>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Pariente </label>
										<div class="col-sm-9">
										 <select class="col-xs-10 col-sm-5" name="miembro_familiar" required="required" id="pariente">
										 <option value="">Seleccione una opción</option>
			                                @foreach($CuadroFamiliar as $cf)
			                                  <option value="{{$cf->id}}">{{$cf->parentesco}}: {{$cf->nombres}}</option>
			                                @endforeach
                               </select>
                              			 
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Motivo de Visita </label>
										<div class="col-sm-9">
										{!!Form::text('motivo',null,['required','class'=>'col-xs-10 col-sm-5','placeholder' => 'Escribir aquí'])!!}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Diagnóstivo Situacional </label>
										<div class="col-sm-9">
										{!!Form::text('diagnostico',null,['required','class'=>'col-xs-10 col-sm-5','placeholder' => 'Escribir aquí...'])!!}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Observaciones </label>
										<div class="col-sm-9">
										{!!Form::text('observaciones',null,['required','class'=>'col-xs-10 col-sm-5','placeholder' => 'Escribir aquí...'])!!}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Intervención Social </label>
										<div class="col-sm-9">
										{!!Form::text('intervencion',null,['required','id'=>'obs','class'=>'col-xs-10 col-sm-5','placeholder' => 'Apoyo mensual con S/.'])!!}
										</div>
									</div>

									<div class="form-group" >
										<div class="col-sm-6">
											<input type='hidden' value="{{Auth::user()->id}}" name="asistenta_social">
											<button type="submit" class="width-35 pull-right btn btn-sm btn-primary col-xs-10 col-sm-5">
											<i class="ace-icon fa fa-cog" ></i>
											<span class="bigger-110"> Actualizar </span>
											</button>
										</div>
									</div>
			                    {!! Form::close() !!}


								</div><!-- PAGE CONTENT ENDS -->
@else
	<h3>¡Error! <span> El Código ingresado no existe</span></h3><a href="{{url('asrc')}}">volver</a>
@endif
@endsection
@section('script')
<script type="text/javascript">
	//Lugar de nacimiento
function pariente(){
    	var pariente=<?php echo $vd->miembro_familiar; ?>;
    	//console.log(pariente);
    	$("#pariente option[value='"+ pariente+"']").attr("selected",true);
    }
pariente();
</script>
@endsection