@extends('master.servicioSocial')
@section('activacion')
	<?php  
		$rcMenu='';$a='active'; $b='';$c=''; $c1='';$c2='';$c3='';$c4='';$d=''; $d1=''; $d2=''; $d3=''; $d4='';$e='';
	?>
@endsection
@section('titulo','Ficha Socio Económica')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-list-alt"></i>	
	<li class="active">Ficha socio Económica</li>
</ul>
@endsection
@section('contenido')
@include('master.mensajes')
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<a href="{{url('jusuexpedientes/reporte')}}" style="position: relative; margin-top: -70px; z-index: 10;" class="btn btn-white btn-primary btn-bold" data-toggle="tooltip" data-placement="top" title="Exportar a Excel"><i class='fa fa-file-excel-o bigger-110 green'></i></a>
		
		<div class="table-header">
			<a href="#" class="btn btn-success btn-xs btn-round">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
				Lista de los Comensales &nbsp;&nbsp;&nbsp;
		</div>
										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Cod. Univ</th>
						<th>Nombres y Apellidos</th>
						<th>Escuela</th>
						<th class="hidden-480">CE</th>
						<th>Beca</th>
						<th class="hidden-480">Estado</th>
						<th></th>
					</tr>
				</thead>
				<?php  
					$ce = array('0' => 'Ninguno','1'=>'Victima de Violencia Política','2'=>'Consejo Universitario','3'=>'Asamblea Universitaria','4'=>'Deportista Calificado' );
				?>
				<tbody>
					@foreach($fichaSocEcon as $expediente)
						<tr>
							<td class="center">{{$expediente->estudiante->cod_univ}}</td>
							<td> {{$expediente->estudiante->user->nombres}}, {{$expediente->estudiante->user->apellido_paterno.' '.$expediente->estudiante->user->apellido_materno}}</td>
							<td>{{$expediente->estudiante->user->estudiante->escuela->escuela}}</td>
							<td class="hidden-480">{{$ce[$expediente->caso_especial]}}</td>
							<td align="center">{{$expediente->tipo_beca}}
							</td>
							<td class="hidden-480" align="center">
								@if($expediente->estado=='1')
								<span class="label label-sm label-success">	Aprobado
								</span>
								@elseif($expediente->estado=='0')
								<span class="label label-sm label-warning">	Desaprobado
								</span>
								@endif
							</td>
							<td>
							<div class="hidden-sm hidden-xs action-buttons">
								<a class="blue" href="{{route('asfichasocial.edit',$expediente->expediente)}}" title="Ver más">
									<i class="ace-icon fa fa-search-plus bigger-130"></i>
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
										<a href="{{route('asfichasocial.edit',$expediente->expediente)}}" class="tooltip-info" data-rel="tooltip" title="Ver más">
											<span class="blue">
												<i class="ace-icon fa fa-search-plus bigger-120"></i>
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
		function valida(e){
          tecla = (document.all) ? e.keyCode : e.which;

          //Tecla de retroceso para borrar, siempre la permite
          if (tecla==8){
              return true;
          }

          // Patron de entrada, en este caso solo acepta numeros
          patron =/[0-9]/;
          tecla_final = String.fromCharCode(tecla);
          return patron.test(tecla_final);
    }

			jQuery(function($) {
				//initiate dataTables plugin
				var myTable =
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
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
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Mostrar/Ocultar columnas</span>",
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

		//Para que salga las letritas negras del title
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
		</script>
@endsection