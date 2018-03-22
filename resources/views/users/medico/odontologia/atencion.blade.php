@extends('master.medico')
@section('activacion')
	<?php
	$i ='';
	$ii='';
	$ii_i='';
	$ii_ii='';
	$ii_iii='';
	$ii_iv='';
	$ii_v='';
	$iii='active open';
	$iii_i='active';
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
@section('titulo','Odontología-Atención')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-heartbeat"></i>
	<li class="active">Odontología</li>
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
			
				Atención &nbsp;&nbsp;&nbsp;
		</div>
		
		<div class="table-responsive">
		<div class="table-responsive">
			<table id="dynamic-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Fecha</th>
						<th class="center">DNI</th>
						<th>Nombres y Apellidos</th>
						<th class="center">Tipo</th>
						<th class="center">Estado</th>
						<th></th>
					</tr>
				</thead>
			</table>
		</div>
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
				var myTable=$('#dynamic-table-2').DataTable( {
			        "processing": true,
			        "serverSide": true,
			        "ajax": '{!!url('enfodontos/inicio')!!}',
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
					        		
				        		return "<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='/meds/buscar?cod="+data.dni+"' title='Ver más'><i class='ace-icon fa fa-search-plus bigger-120'></i></a></div>";
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
				myTable.buttons().container().appendTo( $('.tableTools-container') );

			})

		//Para que salga las letritas negras del title
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
		</script>


@endsection