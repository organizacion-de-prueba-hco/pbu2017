@extends('master.directivo')
@section('activacion')
	<?php
$enc='';
$usu='active open';
$usu_a='';
$usu_b='active';
$usu_c='';
$usu_d='';
$usu_as='';
$usu_sp='';
$usu_e_a='';
$usu_e_b='';
$usu_e_c='';
$search='';
$uafsm='';
$uafsm_a='';
$uafsm_b='';
$ufc='';
$ufc_a='';
$ufc_b='';
$usu_e='';
$search='';
?>
@endsection
@section('titulo','Informes')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-users"></i>
	<li class="active">U. Serv Univ</li>
	<li class="active"><i class="ace-icon fa fa-list-alt"></i> Informe Nutricional</li>
</ul>
@endsection
@section('contenido')

	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
				Lista de los informes nutricionales &nbsp;&nbsp;&nbsp;
			</div>
												

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Fecha</th>
						<th class="center">Título</th>
						<th class="center" class="hidden-480">Archivo</th>
						<th class="center" class="hidden-480">Acciones</th>
					</tr>
				</thead>

				<tbody>
					@foreach($nutriformes as $nutriforme)
						<tr>
							<td align="center">{{$nutriforme->created_at}}</td>
							<td >{{$nutriforme->titulo}}</td>
							<td align="center">
								@if($nutriforme->archivo)
									<a href="{{url('nutriformes/descargar',$nutriforme->archivo)}}">
										<span class="label label-sm label-success"><i class="fa fa- fa-download bigger-110 white"></i>	Descargar
										</span>
									</a>
								@endif
							</td>
							
							<td align="center">
								<a class="orange" href="{{url('pdf/informenutricion',$nutriforme->id)}}" title="Descargar como PDF" target="_black">
									<i class="ace-icon fa fa-file-pdf-o bigger-130"></i>
								</a>

							<div class="hidden-md hidden-lg">
							
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>



@endsection
@section('script')

		<!-- page specific plugin scripts -->
		{!!Html::script('assets/js/jquery.dataTables.min.js')!!}
		{!!Html::script('assets/js/jquery.dataTables.bootstrap.min.js')!!}
		{!!Html::script('assets/js/dataTables.buttons.min.js')!!}
		{!!Html::script('assets/js/buttons.flash.min.js')!!}
		{!!Html::script('assets/js/buttons.html5.min.js')!!}
		{!!Html::script('assets/js/buttons.print.min.js')!!}
		{!!Html::script('assets/js/buttons.colVis.min.js')!!}
		{!!Html::script('assets/js/dataTables.select.min.js')!!}

		<script type="text/javascript">
		
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable =
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": null},
					  null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],

					select: {
						style: 'multi'
					}
			    } );

			})
		</script>


@endsection