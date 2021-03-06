@extends('master.psico')
@section('activacion')
	<?php  
		$i ='';
		$ii='active';
		$iii='';
		$iv='';
	?>
@endsection

@section('titulo','Atención')
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
	<i class="ace-icon fa fa-heartbeat"></i>
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
				Registros &nbsp;&nbsp;&nbsp;
		</div>
										<!--Modal Nuevo-->
		<div id="nuevo-exp" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="smaller lighter blue no-margin">Nuevo Registro</h3>
					</div>

					<div class="modal-body" align="center">
						Ingrese Código Universitario del Estudiante<br>
						{!! Form::open(['url' => 'psicoatencions/nuevo', 'method' => 'POST']) !!}
						<span class="input-icon">
							<input type="number" placeholder="Buscar ..." class="nav-search-input" maxlength="10" required="required" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="cod-nuevo" >
								<i class="ace-icon fa fa-search nav-search-icon"></i>
						</span>
						<button class="btn btn-success btn-sm btn-round submit">
							<i class="ace-icon fa fa-plus"></i>
						</button>
							{!!Form::close()!!}
							<br>
					</div>

											<!-- <div class="modal-footer">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>
											</div> -->
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
										<!--Fin modal Nuevo-->

		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Fecha</th>
						<th class="center">Cod. Univ</th>
						<th>Nombres y Apellidos</th>
						<th>Edad</th>
						<th>Escuela</th>
						<th class="hidden-480">Motivo</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($crs as $rc)
						<tr>
							<td class="center">{{$rc->created_at}}</td>
							<td>{{$rc->estudiante->cod_univ}}</td>
							<td>{{$rc->estudiante->user->nombres.', '.$rc->estudiante->user->apellido_paterno.' '.$rc->estudiante->user->apellido_materno}}</td>
							<td align="center">
								<?php 
                  				if($rc->estudiante->user->estudiante->f_nac!='0000-00-00'){
                  					$fn= Carbon\Carbon::parse($rc->estudiante->user->f_nac);
                  					echo Carbon\Carbon::createFromDate(
                  						$fn->format('Y'),
                  						$fn->format('m'),
                  						$fn->format('d')
                  					)->age;
                  				}
                  				?> 
							</td>
							<td class="hidden-480">{{$rc->estudiante->escuela->escuela}}</td>
							<td>{{$rc->motivo}}
							</td>
							
							<td>
							<div class="action-buttons">
								<a class="blue" href="{{route('psicoatencion.show',$rc->id)}}" title="Ver más">
									<i class="ace-icon fa fa-search-plus bigger-130"></i>
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
					  null, null,null,null, null, 
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