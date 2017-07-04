@extends('master.nutri')
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
@section('titulo','Nuevo Informe')
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
								
								{!! Form::open(['route' => 'nutriforme.store', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Título: </label>
										<div class="col-sm-9">
											<input type="text" name="titulo" placeholder="Escriba aquí" required class="col-xs-10 col-sm-5" value="">
										</div>
								</div><br><br>

								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Subtítulo: </label>
										<div class="col-sm-9">
											<input type="text" name="subtitulo" placeholder="Escriba aquí" required class="col-xs-10 col-sm-5" value="">
										</div>
								</div><br><br>
								
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Adjunte archivo: </label>

										<div class="col-sm-9">
											<input type="text" name="archivo" placeholder="click ----> boton" class="col-xs-10 col-sm-5" value="">
										</div>
								</div><br><br>
								<!-- pegar el editor-->
								
									<textarea id="contenido-n" name="contenido-n" ></textarea>
								
								

								<div class="form-group" >
										<div class="col-sm-6">
										<button type="submit" class="width-35 pull-right btn btn-sm btn-primary col-xs-10 col-sm-5" onclick="capturaNuevo()">
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
 