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
$uafsm='active open';
$uafsm_a='active';
$uafsm_b='';
$ufc='';
$ufc_a='';
$ufc_b='';
$usu_e='';
$search='';
?>
@endsection
@section('titulo','Matrícula')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-futbol-o"></i>
	<li class="active">U. Act. Física Mental</li>
	<li class="active">Matrícula</li>
</ul>
@endsection
@section('contenido')
@include('users.juafsm.matricula.eliminar')
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="nota">
</div>

<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>		
		<div class="table-header">
			<a href="#nuevo-exp" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a> {{$semestre}}
			
		</div>
										<!--Modal Nuevo-->
		<div id="nuevo-exp" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="smaller lighter blue no-margin">Registrar nuevo estudiante</h3>
					</div>

					<div class="modal-body" align="center">
						Ingrese Código Universitario del Estudiante<br>
						{!! Form::open(['url' => 'jufsmatriculas/nuevo', 'method' => 'POST']) !!}
							<span class="input-icon">
							<input type="number" placeholder="Buscar ..." class="nav-search-input" maxlength="10" required="required" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="cod-nuevo" >
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
							<button class="btn btn-success btn-sm btn-round submit">
								<i class="ace-icon fa fa-plus"></i>
							</button>
						{!!Form::close()!!}							<br>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
										<!--Fin modal Nuevo-->
										<!--Modal testear-->
		<div id="testear" class="modal fade" tabindex="-1">
								<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin">Testear estudiante</h3>
											</div>

											<div class="modal-body" align="center">
												Ingrese Código Universitario del Estudiante<br>
													{!! Form::open(['url' => 'jusuexpedientes/testeador', 'method' => 'POST']) !!}
															<span class="input-icon">
																<input type="number" placeholder="Testear ..." class="nav-search-input" maxlength="10"
																required="required"
																oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
																name="cod-test"
																>
																<i class="ace-icon fa fa-search nav-search-icon"></i>
															</span>
															<button class="btn btn-warning btn-sm btn-round submit">
																<i class="ace-icon fa fa-share"></i>
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
										<!--Fin modal Testear-->

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Cod. Univ</th>
						<th>Nombres y Apellidos</th>
						<th>Escuela</th>
						<th class="hidden-480">Taller</th>
						<th>I EX1</th>
						<th>I EX2</th>
						<th>I PAR</th>
						<th>I PRE</th>
						<th>I PROM</th>

						<th>II EX1</th>
						<th>II EX2</th>
						<th>II PAR</th>
						<th>II PRE</th>
						<th>II PROM</th>
					</tr>
				</thead>
				

				<tbody>
					@foreach($matriculas as $m)
						<tr>
							<td class="center">{{$m->estudiant->cod_univ}}</td>
							<td>{{$m->estudiant->user->nombres}} {{$m->estudiant->user->apellido_paterno}} {{$m->estudiant->user->apellido_materno}}</td>
							<td>{{$m->estudiant->escuela->escuela}}</td>
							<td>{{$m->cursotaller->taller->taller}}</td>
							<td>{{$m->i_ex_i}}</td>
							<td>{{$m->i_ex_ii}}</td>
							<td>{{$m->i_par}}</td>
							<td>{{$m->i_pre}}</td>
							<td class="success"><b>{{round(($m->i_ex_i+$m->i_ex_ii+$m->i_par+$m->i_pre)/4,2)}}</b></td>
							<td>{{$m->ii_ex_i}}</td>
							<td>{{$m->ii_ex_ii}}</td>
							<td>{{$m->ii_par}}</td>
							<td>{{$m->ii_pre}}</td>
							<td class="success"><b>{{round(($m->ii_ex_i+$m->ii_ex_ii+$m->ii_par+$m->ii_pre)/4,2)}}</b></td>
														
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
					  null, null,null, null, null, null, null, null, null, null, null, null, null
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
		function eliminar(ids){
        var id=ids;
        document.getElementById("eliminar-e").href ="jufsmatriculas/eliminar/"+id;
      }

      function Cambiarnota(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        var route="jufsmatricula/"+id+"/edit";
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',
          success: function(result){
            console.log(result);
            $('#nota').html(result);
          }                  
        });
      }
		</script>
@endsection