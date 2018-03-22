@extends('master.odontologo')
@section('activacion')
	<?php
	$i ='';
	$ii='active';
	$iii='';
	$iii_i='';
	$iii_ii='';
	$iii_iii='';
	$iv='';
	?>
@endsection
@section('titulo','Medicina-Atención')
@section('estilos')
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
			<div class="pull-right tableTools-container-2"></div>
		</div>
		<div class="table-header">
				Atención (general)&nbsp;&nbsp;&nbsp;
		</div>

										<!--Modal Reportes y constancias-->
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
								<i class="ace-icon fa fa-th-large bigger-120"> Receta - Odontología</i>
							</span>
						</a><br><hr><br>
						<a href="#" id="historial-o" data-dismiss="modal">
							<span class="blue">
								<i class="ace-icon fa fa-th-large bigger-120"> Este Expediente</i>
							</span>
						</a><br><br>
						<a href="#" id="historial-t" data-dismiss="modal">
							<span class="green">
								<i class="ace-icon fa fa-th-large bigger-120"> Todo el Historial</i>
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
			<table id="dynamic-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Fecha</th>
						<th class="center">DNI</th>
						<th>Nombres y Apellidos</th>
						<th class="center">Tipo</th>
						<th class="center">Cód Exp</th>
						<th class="center">Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				
			</table>
		</div>
	</div>
</div>
<br><br>
<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
				 Atenciones realizadas&nbsp;&nbsp;&nbsp;
		</div>
										
										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Fecha</th>
						<th class="center">DNI</th>
						<th class="center">Nombres</th>
						<th class="center">Tipo</th>
						<th>Procedimiento</th>
					</tr>
				</thead>
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


		//Para que salga las letritas negras del title
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});

		function reportes($id,$estudiante){
			//console.log($id);
			$('#rm').attr({onclick: "cerrarmodal();"});
			$('#historial-o').attr({onclick: "cerrarmodal();"});
			$('#historial-t').attr({onclick: "cerrarmodal();"});

			$("#rm").attr('href','/odontodontos/descargareporte/1/'+$id);
			$("#historial-o").attr('href','/pdf/odontologia/'+$id);
			$("#historial-t").attr('href','/pdf/odontologiatodo/'+$estudiante);
		}

			jQuery(function($) {
				var myTable=$('#dynamic-table-2').DataTable( {
			        "processing": true,
			        "serverSide": true,
			        "ajax": '{!!url('odontodontos/inicio')!!}',
			        "language":{"url":'{!! asset('/assets/js/latino.json') !!}'
                  } ,
                 "order": [[ 0, "desc" ]],
			        "columns" : [
				        {data:"fecha","sClass": "center"},
				        {data:"dni","sClass": "center"},
				        {data:"nombres"},
				        {data:null, render: 
				        		function ( data, type, row ) {
				        			if(data.tipo=='5'){	
				        				return "<div align='center'>Estudiante</div>";
					        		}else{return "<div align='center'>No estudiante</div>";}
					        	}
					       },
					     {data:"id","sClass": "center"},
                	  {data:null, render: 
				        	function ( data, type, row ) {
				        		if(data.dx!=''){
				        			var estado="Atendido";
				        			var clase ="label label-sm label-success";
                				}else{
                					var estado="Pendiente";
                					var clase ="label label-sm label-warning";
                				}
                				return "<div align='center'><span class='"+clase+"'>"+estado+"</div>";
                			}
                		},
                		{data:null, render: 
				        	function ( data, type, row ) {
					        		if(data.mc != ''){
					        			var ruta="#reportes-modal";
					        		}else{
					        			var ruta="/odontodontos/descargareporte/0/0";
					        		}
				        		return "<div class='action-buttons center'><a href='"+ruta+"' data-toggle='modal' class='tooltip-info' data-rel='tooltip' title='Reportes y constancias' onclick='reportes("+data.id+","+data.user_id+")'><span class='orange'><i class='ace-icon fa fa-th-large bigger-120'></i></span></a><a href='/odontodonto/"+data.id+"' class='tooltip-info' data-rel='tooltip' title='Ver más'><span class='blue'><i class='ace-icon fa fa-search-plus bigger-120'></i></span></a></div>";
                			}
                		}
			        ]
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
				myTable.buttons().container().appendTo( $('.tableTools-container-2') );

				//-----------------------------------------------------------

				var myTable=$('#dynamic-table').DataTable( {
			        "processing": true,
			        "serverSide": true,
			        "ajax": '{!!url('odontodontos/inicio2')!!}',
			        "language":{"url":'{!! asset('/assets/js/latino.json') !!}'
                  } ,
                 "order": [[ 0, "desc" ]],
			        "columns" : [
				        {data:"fecha","sClass": "center"},
				        {data:"dni","sClass": "center"},
				        {data:"nombres"},
				        {data:null, render: 
				        		function (data, type, row ){
				        			if(data.tipo=='5'){	
				        				return "<div align='center'>Estudiante</div>";
					        		}else{return "<div align='center'>No estudiante</div>";}
					        	}
					      },     	  
                	  {data:"procedimiento"}
			        ]
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

		</script>


@endsection