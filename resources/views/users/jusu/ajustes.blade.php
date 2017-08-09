@extends('master.jusu')
@section('activacion')
	<?php
$oa = '';
$nbecas='';
$enc='';
$in='';
?>
@endsection
@section('titulo','Nuevo Expediente')
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
		.thumb{
               border: 1px solid #000;
               margin: 10px 5px 0 0;
               width: 100%;
               text-align: center;
            }
	</style>
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-cog"></i>
	<li class="active">Ajustes</li>
</ul>
@endsection
@section('contenido')
     <!-- Small modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="EditarFotoEstudiante">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title">Actualizar foto del estudiante</h4>
                        </div>
                        <div class="modal-body">                        
                          {!! Form::open(['url' => 'jusuajuste/foto','method'=>'post', 'class'=>'form-horizontal form-label-left','enctype'=>'multipart/form-data']) !!}
                          <div class="item form-group">
                            <div class="col-12">
                              <input type="file" id="files-foto" name="foto" accept="image/*"/><br>
                              <output id="lista"><img src="{{url('imagenes/avatar/'.Auth::user()->foto)}}" width="100%"></output>
                            </div>
                          </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-success" value="Actualizar" >
                        </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
      </div>
    </div>
    <!--FIN modal-->

<div class="hr dotted"></div>


<div class="col-xs-12">
	<h2 class="StepTitle" align="center">Actualizar Mis Datos</h2>
			<div align="center">
				<a href="#" title="Clic para actualizar foto" data-toggle="modal" 
                   data-target="#EditarFotoEstudiante" title="Editar">
				<span class="profile-picture">
					<img id="avatar" alt="avatar" src="{{url('imagenes/avatar/'.Auth::user()->foto)}}" height="170px;">
				</span>
				</a>
			</div><hr>
								<!-- PAGE CONTENT BEGINS -->
	{!! Form::open(['route' => 'jusuajustes.store', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombres </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Código Universitario" name="nombres" class="col-xs-10 col-sm-5" value="{{Auth::user()->nombres}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Apellido Paterno </label>
										<div class="col-sm-9">
											<input type="text" name="apellido_paterno" id="form-field-1-1" placeholder="Paterno" class="col-xs-10 col-sm-5"  value="{{Auth::user()->apellido_paterno}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Apellido Materno </label>
										<div class="col-sm-9">
											<input type="text" name="apellido_materno" id="form-field-1-1" placeholder="Materno" class="col-xs-10 col-sm-5"  value="{{Auth::user()->apellido_materno}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> E-mail </label>
										<div class="col-sm-9">
											<input type="text" name="email" id="form-field-1-1" placeholder="E-mail" class="col-xs-10 col-sm-5"  value="{{Auth::user()->email}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> DNI </label>
										<div class="col-sm-9">
											<input type="text" name="dni" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5"  value="{{Auth::user()->dni}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Contraseña </label>
										<div class="col-sm-9">
											<input type="text" name="pasword" id="form-field-1-1" placeholder="Opcional (cambiar contraseña)" class="col-xs-10 col-sm-5">
										</div>
									</div>
									
									
									<div class="form-group" >
										<div class="col-sm-6">
										
											<button type="submit" class="width-35 pull-right btn btn-sm btn-primary col-xs-10 col-sm-5">
											<i class="ace-icon fa fa-cog" ></i>
											<span class="bigger-110">Actualizar</span>
											</button>
										</div>
									</div>
	{!! Form::close() !!}
</div><!-- PAGE CONTENT ENDS -->
@endsection
@section('script')
<script type="text/javascript">
	//Mostrar imagenes del imput file
    function foto(evt) {
      var files = evt.target.files; // FileList object
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
           var reader = new FileReader();
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("lista").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
  	}      
      document.getElementById('files-foto').addEventListener('change', foto, false);
</script>
@endsection