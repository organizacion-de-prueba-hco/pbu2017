@extends('master.nutri')
@section('activacion')
	<?php
$oa = 'active';
$a  = '';
$b  = '';
?>
@endsection
@section('titulo','Informes')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-list-alt"></i>
	<li class="active">Informe Nutricional</li>
</ul>
@endsection
@section('contenido')
@include('master.mensajes')

	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			<a href="nutriforme/create" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
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
							
							<td>

							<div class="hidden-sm hidden-xs action-buttons" align="center">
								<a class="blue" href="{{route('nutriforme.show',$nutriforme->id)}}" title="Ver más">
									<i class="ace-icon fa fa-search-plus bigger-130"></i>
								</a>
								<a class="orange" href="{{url('pdf/informenutricion',$nutriforme->id)}}" title="Descargar como PDF" target="_black">
									<i class="ace-icon fa fa-file-pdf-o bigger-130"></i>
								</a>
								<a class="green" href="{{route('nutriforme.edit',$nutriforme->id)}}">
									<i class="ace-icon fa fa-pencil bigger-130"></i>
								</a>
							</div>

							<div class="hidden-md hidden-lg">
							<!--Cuando se comprime la pantalla-->
							<div class="inline pos-rel">
								<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
									<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
								</button>

								<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
									<li>
										<a href="{{route('nutriforme.show',$nutriforme->id)}}" class="tooltip-info" data-rel="tooltip" title="Ver más">
											<span class="blue">
												<i class="ace-icon fa fa-search-plus bigger-120"></i>
											</span>
										</a>
									</li>
									<li>
										<a href="{{url('pdf/informenutricion',$nutriforme->id)}}" class="tooltip-info" data-rel="tooltip" title="Descargar como PDF">
											<span class="orange">
												<i class="ace-icon fa fa-file-pdf-o bigger-120"></i>
											</span>
										</a>
									</li>
									<li>
										<a href="{{route('nutriforme.edit',$nutriforme->id)}}" class="tooltip-success" data-rel="tooltip" title="Editar">
											<span class="green">
												<i class="ace-icon fa fa-pencil-square-o bigger-120">
												</i>
											</span>
										</a>
									</li>
								</ul>

								</div>
							</div>
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

				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copiar al Portapapeles</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Exportar a CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Imprimir</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'Reporte'
					  }
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );

				






			})

		//Testeador
		function testeador(cod_univ){

		}
		</script>


@endsection