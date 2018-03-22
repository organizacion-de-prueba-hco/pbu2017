@extends('master.enfermera')
@section('activacion')
	<?php
	$i ='';
	$ii='active open';
	$ii_i='';
	$ii_ii='';
	$ii_iii='';
	$ii_iv='active';
	$iii='';
	$iii_i='';
	$iii_ii='';
	$iv='';
	$iv_i='';
	$iv_ii='';
	$v='';
	$v_i='';
	$v_ii='';
	$v_iii='';
	$iv_iii='';
	$vi='';
	?>
@endsection
@section('titulo','Constancia por Enfermedad')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-user-md"></i>
	<li class="active">Medicina</li>
	<li class="active">Constancia por Enfermedad</li>
</ul>
@endsection
@section('contenido')
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		
		<div class="table-header">
			Constancia por Enfermedad
		</div>
										

									
		<a href="#" id="abrir"></a>
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Fecha</th>
						<th class="center">DNI</th>
						<th>Nombres y Apellidos</th>
						<th>Tipo</th>
						<th>Días de Permiso</th>
						<th></th>
					</tr>
				</thead>
				<?php  
					$ce = array('0' => 'Ninguno','1'=>'Victima de Violencia Política','2'=>'Consejo Universitario','3'=>'Asamblea Universitaria','4'=>'Deportista Calificado' );
				?>
				<tbody>
					@foreach($tbcs as $tbc)
						<tr>
							<td class="center">{{$tbc->created_at}}</td>
							<td class="center">{{$tbc->medicina->user->dni}}</td>
							<td> {{$tbc->medicina->user->nombres}}, {{$tbc->medicina->user->apellido_paterno.' '.$tbc->medicina->user->apellido_materno}}</td>
							<td>
								@if($tbc->medicina->user->tipo_user=='5')
				        			Estudiante
					        	@else No estudiante
					        	@endif
							</td>
							<td class="center">{{$tbc->periodo}}</td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a href="{{url('enfmeds/descargareporte/4/'.$tbc->medicina_id)}}" class="tooltip-info" data-rel="tooltip" title="Descargar en PDF">
									<span class="orange">
										<i class="ace-icon fa fa-download bigger-120"></i>
									</span>
									</a>
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
				var myTable =$('#dynamic-table').DataTable( 
					{"language":{"url":'{!! asset('/assets/js/latino.json') !!}'},
					"order": [[ 0, "desc" ]]
			    });



				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copiar al Portapapeles</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-download bigger-110 green' title='descargar'></i> <span class='hidden'>Exportar a CSV</span>",
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



	

		</script>


@endsection