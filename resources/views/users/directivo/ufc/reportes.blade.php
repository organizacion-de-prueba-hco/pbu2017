@extends('master.directivo')
@section('activacion')
	<?php
$enc='';
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
$uafsm='';
$uafsm_a='';
$uafsm_b='';
$ufc='active open';
$ufc_a='';
$ufc_b='active';
$usu_e='';
$search='';
?>
@endsection
@section('titulo','Reportes')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-tachometer"></i>
	<li class="active">U. Form. Cultural</li>
	<li class="active">Reportes</li>
</ul>
@endsection
@section('contenido')

	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			
				Reportes &nbsp;&nbsp;&nbsp;
			</div>
												

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Semestre</th>
						<th class="center">Acciones</th>
					</tr>
				</thead>

				<tbody>
					@foreach($semestres as $s)
					<tr>
						<td align="center">{{$s}}</td>
						<td class="action-buttons" align="center">
						<a href="{{route('jufsmreporte.show',$s)}}" data-toggle="tooltip" title="Descargar">
							<span class="green">
								<i class="ace-icon fa fa-file-excel-o bigger-120"></i>
							</span>
							</a>
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
					  { "bSortable": false }
					],
					"aaSorting": [],

					select: {
						style: 'multi'
					}
			    } );

			})

			//Para que salga las letritas negras del title
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
		</script>


@endsection