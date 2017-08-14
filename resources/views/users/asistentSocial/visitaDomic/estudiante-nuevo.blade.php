@extends('master.servicioSocial')
@section('activacion')
	<?php  
		$a='';$rcMenu=''; $b=''; $c='active open'; $c1='active'; $c2='';$c3=''; $c4='';$d='';$d1=''; $d2=''; $d3=''; $d4='';$e='';
	?>
@endsection
@section('titulo','Declaración Jurada')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-home"></i>	
	<li class="active">Visita Domiciliaria</li>
	<li class="active">Estudiante</li>
	<li>Nuevo</li>
</ul>
@endsection
@section('contenido')
@if($estudiante)
	           <!-- Small modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="NuevoCfamiliar">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
               <h4 class="modal-title" id="myModalLabel2">Nuevo Pariente</h4>
         </div>                      
            {!! Form::open(['url'=>'asvisitadomc1s/nuevopariente', 'method'=>'post','class'=>'form-horizontal form-label-left']) !!}
         <div class="modal-body">
            <div class="item form-group">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>NOMBRES Y APELLIDOS</label>
                     {!!Form::text('nombres', null, ['autofocus'=>'autofocus', 'required','class'=> 'form-control', 'placeholder'=>'Nombres y Apellidos'])!!}
               </div>
                      </div>
                                            
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>PARENTESCO</label>
                              {!!Form::text('parentesco', null, ['required','class'=> 'form-control','placeholder'=>'Parentesco'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>FECHA DE NACIMIENTO</label>
                              {!!Form::date('f_nac',\Carbon\Carbon::now(), ['class'=>'form-control'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>N° DNI</label>
                              {!!Form::text('dni',null, ['required','class'=> 'form-control','placeholder'=>'N° DNI'])!!}
                            </div>
                      </div>
                      
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>GRADO DE INSTRUCCIÓN</label>
                              {!!Form::select('grado_instrucion',$instruccion,null,['required', 'class'=>'form-control unidad'])!!}
                            </div>
                      </div>
                      
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>OCUPACIÓN</label><br>
                              {!!Form::text('ocupacion', null, ['required','class'=> 'form-control','placeholder'=>'ocupación'])!!}
                            </div>
                      </div> 
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>RESIDENCIA</label>
                              {!!Form::text('residencia', null, ['required','class'=> 'form-control','placeholder'=>'Lugar de residencia'])!!}
                            </div>
                      </div>         
         </div>
         <div class="modal-footer">
            <input type="hidden" name="user_id" value="{{$estudiante->user_id}}">
            <input type="submit" class="btn btn-success" value="Agregar">
         </div>
         {!! Form::close() !!}
      </div>
   </div>
</div>

<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
								<br>
								{!! Form::open(['route' => 'asvisitadomc1.store', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
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
										 <select class="col-xs-10 col-sm-5" name="miembro_familiar" required="required">
										 <option value="">Seleccione una opción</option>
			                                @foreach($CuadroFamiliar as $cf)
			                                  <option value="{{$cf->id}}">{{$cf->parentesco}}: {{$cf->nombres}}</option>
			                                @endforeach
                              			 </select>
                              			 <a href="#NuevoCfamiliar" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal">
											 <i class="ace-icon fa fa-plus  bigger-110 icon-only"> </i>
										</a>
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
											<i class="ace-icon fa fa-plus" ></i>
											<span class="bigger-110">Registrar </span>
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
	
</script>
@endsection