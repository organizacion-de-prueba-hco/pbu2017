@extends('master.medico')
@section('activacion')
	<?php
	$i ='';
	$ii='active open';
	$ii_i='';
	$ii_ii='';
	$ii_iii='';
	$ii_iv='';
	$ii_v='active';
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
@section('titulo','Medicina-Atención')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-user-md"></i>
	<li class="active">Medicina</li>
	<li class="active">Atención</li>
</ul>
@endsection
@section('contenido')
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		
		<div class="table-header">
			<a href="#nuevo-exp" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
				Atención &nbsp;&nbsp;&nbsp;
		</div>
										<!--Modal Nuevo-->
		<div id="nuevo-exp" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="smaller lighter blue no-margin">Registrar Nueva Atención Médica</h3>
					</div>

					<div class="modal-body" align="center">Ingrese Código Universitario del Estudiante<br>
						{!! Form::open(['url' => 'medmeds/nuevo', 'method' => 'GET']) !!}
						<span class="input-icon">
							<input type="number" placeholder="Buscar ..." class="nav-search-input" maxlength="10" required="required" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="cod" >
										<i class="ace-icon fa fa-search nav-search-icon"></i>
						</span>
						<button class="btn btn-success btn-sm btn-round submit">
							<i class="ace-icon fa fa-plus"></i>
						</button>
						{!!Form::close()!!}
						<br>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>

		<div id="reportes-modal" class="modal fade" tabindex="-1">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="smaller lighter blue no-margin">Generar y/o descargar: </h3>
					</div>
					<br>
					<div class="hidden-sm hidden-xs action-buttons" align="center">
						<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<a href="#" id="rm">
							<span class="black">
								<i class="ace-icon fa fa-th-large bigger-120"> Receta médica</i>
							</span>
						</a><br><br>
						<a href="#" id="tbc" data-dismiss="modal">
							<span class="blue">
								<i class="ace-icon fa fa-th-large bigger-120"> Descarte de TBC</i>
							</span>
						</a><br><br>
						<a href="#" id="cbs" data-dismiss="modal">
							<span class="green">
								<i class="ace-icon fa fa-th-large bigger-120"> Constancia de buena Salud</i>
							</span>
						</a><br><br>
						<a href="#" id="cpe" data-dismiss="modal">
							<span class="orange">
								<i class="ace-icon fa fa-th-large bigger-120"> Constancia por enfermedad</i>
							</span>
						</a><br><br><hr>
						<a href="#" id="med" data-dismiss="modal">
							<span class="blue">
								<i class="ace-icon fa fa-th-large bigger-120"> Esta Ficha</i>
							</span>
						</a><br><br>
						<a href="#" id="med-t" data-dismiss="modal">
							<span class="black">
								<i class="ace-icon fa fa-th-large bigger-120"> Toda la fichas (Historial)</i>
							</span>
						</a><br><br>
					</div><br>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
										<!--Fin Fin de reportes y constancias -->
										
										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<a href="#" id="abrir"></a>
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Fecha</th>
						<th class="center">DNI</th>
						<th>Nombres y Apellidos</th>
						<th>Sexo</th>
						<th class="center">Estado</th>
						<th class="center">Cita</th>
						<th></th>
					</tr>
				</thead>
				<?php  
					$ce = array('0' => 'Ninguno','1'=>'Victima de Violencia Política','2'=>'Consejo Universitario','3'=>'Asamblea Universitaria','4'=>'Deportista Calificado' );
				?>
				<tbody>
					@foreach($medicina as $med)
						<tr>
							<td class="center">{{$med->created_at}}</td>
							<td class="center">{{$med->user->dni}}</td>
							<td> {{$med->user->nombres}}, {{$med->user->apellido_paterno.' '.$med->user->apellido_materno}}</td>
							<td>
								@if($med->user->genero == '1')
									Masculino
								@elseif($med->user->genero == '0')
									Femenino
								@endif
							</td>
							<td class="hidden-480" align="center">
								@if($med->imp_dx != '')
								<span class="label label-sm label-success">	Atendido
								</span>
								@else
								<span class="label label-sm label-warning">	Pendiente
								</span>
								@endif
							</td>
							<td align="center">
							@if($med->cita!='0000-00-00')
								{{$med->cita}}
							@endif
							</td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a @if($med->imp_dx != '') href="#reportes-modal" @else href="{{url('medmeds/descargareporte',[0,0])}}" @endif data-toggle="modal" class="tooltip-info" data-rel="tooltip" title="Reportes y constancias" onclick="reportes('{{$med->id}}','{{$med->user_id}}')">
									<span class="orange" >
										<i class="ace-icon fa fa-th-large bigger-120"></i>
									</span>
									</a>
									<a href="{{route('medmed.show',$med->id)}}" class="tooltip-info" data-rel="tooltip" title="Ver más">
									<span class="blue">
										<i class="ace-icon fa fa-search-plus bigger-120"></i>
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
				//initiate dataTables plugin
				var myTable =
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": null },
					  null, null,null, null,null,
					  { "bSortable": false }
					],
					"aaSorting": [],
				} );
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

		//Para que salga las letritas negras del title
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip(); 
		});

		function reportes($id,$estudiante){
			//console.log($id);
			$('#rm').attr({onclick: "cerrarmodal();"});
			$('#tbc').attr({onclick: "cerrarmodal();"});
			$('#cbs').attr({onclick: "cerrarmodal();"});
			$('#cpe').attr({onclick: "cerrarmodal();"});
			$('#med').attr({onclick: "cerrarmodal();"});
			$('#med-t').attr({onclick: "cerrarmodal();"});

			$("#rm").attr('href','/medmeds/descargareporte/1/'+$id);
			$("#tbc").attr('href','/medmeds/descargareporte/2/'+$id);
			$("#cbs").attr('href','/medmeds/descargareporte/3/'+$id);
			$("#cpe").attr('href','/medmeds/descargareporte/4/'+$id);
			$("#med").attr('href','/pdf/medicina/'+$id);
			$("#med-t").attr('href','/pdf/medicinatodo/'+$estudiante);
		}

		function cerrarmodal(){
			 $('#reportes-modal').modal('hide');
		}

		</script>


@endsection