@extends('master.nutri')
@section('activacion')
	<?php
$oa = 'active';
?>
@endsection
@section('titulo','Editar Informe')
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
									Editar Informe
								</h4>
								
<!-- inicio formulario -->
								
								{!! Form::model($informenutricion,['route' => ['nutriforme.update', $informenutricion->id], 'method' => 'PUT', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Título: </label>
										<div class="col-sm-9">
											<input type="text" name="titulo" placeholder="Escriba aquí" required class="col-xs-10 col-sm-5" value="{{$informenutricion->titulo}}">
										</div>
								</div><br><br>

								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Subtítulo: </label>
										<div class="col-sm-9">
											<input type="text" name="subtitulo" placeholder="Escriba aquí" required class="col-xs-10 col-sm-5" value="{{$informenutricion->subtitulo}}">
										</div>
								</div><br><br>
								
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Adjunte archivo: </label>

										<div class="col-sm-9">
											<input type="file" name="archivo" class="col-xs-10 col-sm-12"><br><br>
											@if($informenutricion->archivo!='')
											<label>
												<input name="eliminar" class="ace" type="checkbox" value="1">
												<span class="lbl"> Eliminar archivo adjunto</span>
												</label>
              								@endif	
										</div>
								</div><br>
								<!-- pegar el editor-->
								
									<textarea id="contenido-n" name="contenido-n"></textarea><br><br>
									<br><br><br>
								

								<div class="form-group" align="center">
										<div class="col-12">
										<button type="submit" class="btn btn-sm btn-primary" onclick="capturaActualizar()">
											<i class="ace-icon fa fa-plus" ></i>
											<span class="bigger-110">Actualizar </span>
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
       $("#contenido-n").Editor("setText", '<?php echo $informenutricion->contenido; ?>');
  });
  //Capturar texto con sus estilos Nuevo
  function capturaActualizar(){
    $('#contenido-n').val($("#contenido-n").Editor("getText"));
  }
</script>
@endsection
 