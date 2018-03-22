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
	$vi='active';
	?>
@endsection
@section('titulo','Medicina-No Estudiante')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-user-times"></i>
	<li class="active">No Estudiantes</li>
</ul>
@endsection

@section('contenido')
@include('users.medico.noEstudiantes.nuevo-noEstudiante')
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			<a href="#nuevo-noEst" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
				Lista &nbsp;&nbsp;&nbsp;
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
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">DNI</th>
						<th>Ap. Paterno</th>
						<th>Ap. Materno</th>
						<th>Nombres</th>
						<th class="center">Sexo</th>
						<th class="center">Usuario</th>
						<th>Descripción</th>
					</tr>
				</thead>
				<tbody>
					@foreach($noEstudiantes as $no)
						<tr>
							<td class="center">{{$no->user->dni}}</td>
							<td >{{$no->user->apellido_paterno}}</td>
							<td >{{$no->user->apellido_materno}}</td>
							<td > {{$no->user->nombres}}</td>
							<td class="hidden-480" align="center">
								@if($no->user->genero == '1')
								<span class="label label-sm label-success">	Masculino
								</span>
								@elseif($no->user->genero == '0')
								<span class="label label-sm label-warning">	Femenino
								</span>
								@endif
							</td>
							<td class="center">{{$usuario[$no->usuario]}}</td>
							<td class="center">{{$no->usuario_descripcion}}</td>
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
					"language":{"url":'{!! asset('/assets/js/latino.json') !!}'},
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": null },
					  null, null, null,null, null,null
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
			$('#historial-o').attr({onclick: "cerrarmodal();"});
			$('#historial-t').attr({onclick: "cerrarmodal();"});

			$("#rm").attr('href','/odontodontos/descargareporte/1/'+$id);
			$("#historial-o").attr('href','/pdf/odontologia/'+$id);
			$("#historial-t").attr('href','/pdf/odontologiatodo/'+$estudiante);
		}

		function cerrarmodal(){
			 $('#reportes-modal').modal('hide');
		}

		//Lugar de nacimiento
    $("#departamento_nac").change(event => {
      //Usaremos la ruta que creamos para los selects anidados en "Tutor"
      $.get(`/prov/${event.target.value}`,function(res,sta){
        $("#provincia_nac").empty();
        //console.log(res);
        $("#provincia_nac").append(`<option value=''>Provincia</option>`);
        res.forEach(element => {
          $("#provincia_nac").append(`<option value=${element.id}>${element.provincia}</option>`);
        });

      });
    });

    $("#provincia_nac").change(event => {
      $.get(`/dist/${event.target.value}`,function(res,sta){
        $("#distrito_nac").empty();
        //console.log(res);
        $("#distrito_nac").append(`<option value=''>Distrito</option>`);
        res.forEach(element => {
          $("#distrito_nac").append(`<option value=${element.id}>${element.distrito}</option>`);
        });

      });
    });
		</script>


@endsection