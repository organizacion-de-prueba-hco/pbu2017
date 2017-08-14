@extends('master.directivo')
@section('activacion')
	<?php
	$enc='active';
	$usu='';
	$usu_a='';
	$usu_b='';
	$usu_c='';
	$usu_d='';
	$usu_as='';
	$usu_sp='';
	$usu_exo='';
	$usu_e_a='';
	$usu_e_b='';
	$usu_e_c='';
	$search='';

	?>
@endsection
@section('titulo','Expedientes')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-list-alt"></i>
	<li class="active">Encuestas</li>
</ul>
@endsection
@section('contenido')
@include('master.mensajes')
<?php 
$encuestas=App\Encuesta::get();
 ?>
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		
		
		<div class="table-header">
			
				Encuestas de satisfacción del comedor &nbsp;&nbsp;&nbsp;
			
		</div>

		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Encuesta</th>
						<th class="center">Estado</th>
						<th class="center">Acciones</th>
					</tr>
				</thead>

				<tbody>
					@foreach($encuestas as $us)
						<tr class="center">
							<td>{{$us->encuesta}}</td>
							<td>
								@if($us->estado=='1')
                           <button class="submit btn btn-success btn-xs">Activo</button>
                        @else
                           <button class="submit btn btn-danger btn-xs">Inactivo</button>
                            {!!Form::close() !!}
                        @endif
							</td>
							<td>
							<a href="{{url('suencuestas/excel',$us->id)}}" title="Descargar Excel" style="color: green; font-size:2em; padding-right: 4px;"><i id="ico-plus" class="fa fa-file-excel-o"></i></a>
							</td>
						</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>


@endsection
@section('script')
		<script type="text/javascript">
		//Para que salga las letritas negras del title
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
		</script>


@endsection