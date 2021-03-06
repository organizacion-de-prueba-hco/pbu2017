@extends('master.nutri')
@section('activacion')
	<?php
$oa = 'active';
$a  = '';
?>
@endsection
@section('titulo','Nuevo Informe')
@section('estilos')
	{!!Html::style('editor/editor.css',['rel'=>'stylesheet'])!!}
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
	<li class="active">Informe Nutricional</li>
	<li class="active">Nuevo</li>
</ul>
@endsection
@section('contenido')
			<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<h4 class="header green clearfix">
									Nuevo Informe
								</h4>
								
<!-- inicio formulario -->
								
								{!! Form::open(['route' => 'nutriforme.store', 'method' => 'POST', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Título: </label>
										<div class="col-sm-9">
											<input type="text" name="titulo" placeholder="Escriba aquí" required class="col-xs-10 col-sm-5" value="">
										</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Subtítulo: </label>
									<div class="col-sm-9">
										<input type="text" name="subtitulo" placeholder="Escriba aquí (opcional)" class="col-xs-10 col-sm-5" value="">
									</div>
								</div>
								
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Adjunte archivo: </label>
										<div class="col-sm-9">
											<input type="file" name="archivo">
										</div>
								</div>
								<!-- pegar el editor-->

								<div class="item form-group">
                        			<div class="col-md-12 col-sm-12 col-xs-12">
                          				<label>Contenido</label>
                          					<div class="col-lg-12 nopadding">
                           			 			<textarea id="contenido-n" name="contenido-n"></textarea> 
                          					</div>
                          				<br/>
                        			</div>
                     			 </div>

                     			 <hr>

								<div class="form-group" >
									<div class="col-sm-12" align="center">
										<button type="submit" class=" btn btn-sm btn-primary" onclick="capturaNuevo()">
											<i class="ace-icon fa fa-plus" ></i>
											<span class="bigger-110">Guardar </span>
										</button>
									</div>
								</div>

								 {!! Form::close() !!}

								

								<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->

			
@endsection
@section('script')
{!!Html::script('editor/editor.js')!!}
 <script type="text/javascript">
  //TextArea Nuevo
  $(document).ready(function() {
        $("#contenido-n").Editor();
  });
  //Capturar texto con sus estilos Nuevo
  function capturaNuevo(){
    $('#contenido-n').val($("#contenido-n").Editor("getText"));
  }
</script>
@endsection
 