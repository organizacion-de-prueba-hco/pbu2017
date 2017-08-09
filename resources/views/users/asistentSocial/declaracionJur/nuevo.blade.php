@extends('master.servicioSocial')
@section('activacion')
	<?php  
		$rcMenu='';$a=''; $b='active'; $c1=''; $c2='';$c='';$c3=''; $c4='';$d='';$d1=''; $d2=''; $d3=''; $d4='';$e='';
	?>
@endsection
@section('title','Declaración Jurada')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-comment"></i>	
	<li class="active">Declaración Jurada</li>
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
            {!! Form::open(['url'=>'asdj/nuevopariente', 'method'=>'post','class'=>'form-horizontal form-label-left']) !!}
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
								{!! Form::open(['route' => 'asdeclaracionjurada.store', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
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
										 <label><b>Datos del Apoderado</b></label>
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
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Departamento de Residencia:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('departamento',$departamentos,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-10 col-sm-5','placeholder' => 'Departamento'])!!}
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Provincia de Residencia:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('provincia',$provincias,null,['id'=>'provincia_nac','class'=>'col-xs-10 col-sm-5','placeholder' => 'Provincia'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Distrito de Residencia:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('distrito',$distritos,null,['id'=>'distrito_nac', 'class'=>'col-xs-10 col-sm-5','placeholder' => 'Distrito'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Empleo </label>
										<div class="col-sm-9">
										{!!Form::text('desempenio_como',null,['required','class'=>'col-xs-10 col-sm-5','placeholder' => 'Se desempeña como'])!!}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Haber mensual S/ </label>
										<div class="col-sm-9">
										{!!Form::text('haber_mensual',null,['required','id'=>'obs','class'=>'col-xs-10 col-sm-5','placeholder' => 'Escribir aquí...'])!!}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> N° Hijos </label>
										<div class="col-sm-9">
										{!!Form::text('n_hijos',null,['required','id'=>'obs','class'=>'col-xs-10 col-sm-5','placeholder' => 'Escribir aquí...'])!!}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Apoyo mensual con (S/.) </label>
										<div class="col-sm-9">
										{!!Form::text('apoyo_mensual',null,['required','id'=>'obs','class'=>'col-xs-10 col-sm-5','placeholder' => 'Apoyo mensual con S/.'])!!}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Otros Gastos </label>
										<div class="col-sm-9">
										{!!Form::text('otros_gastos',null,['required','id'=>'obs','class'=>'col-xs-10 col-sm-5','placeholder'=>'Escriba aquí...'])!!}
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
	//Lugar de nacimiento
    $("#departamento_nac").change(event => {
    	//console.log('sssss');
      //Usaremos la ruta que creamos para los selects anidados en "Tutor"
      $.get(`/prov/${event.target.value}`,function(res,sta){
        $("#provincia_nac").empty();
        //console.log(res);
        $("#provincia_nac").append(`<option value=''>Provincia</option>`);
        res.forEach(element => {
          $("#provincia_nac").append(`<option value=${element.id}>${element.provincia}</option>`);
        });

      });
    });

    $("#provincia_nac").change(event => {
      $.get(`/dist/${event.target.value}`,function(res,sta){
        $("#distrito_nac").empty();
        //console.log(res);
        $("#distrito_nac").append(`<option value=''>Distrito</option>`);
        res.forEach(element => {
          $("#distrito_nac").append(`<option value=${element.id}>${element.distrito}</option>`);
        });

      });
    });
</script>
@endsection