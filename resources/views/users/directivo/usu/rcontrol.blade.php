@extends('master.directivo')
@section('activacion')
	<?php
$enc='';
$usu='active open';
$usu_a='';
$usu_b='';
$usu_c='';
$usu_d='';
$usu_as='active';
$usu_sp='';
$usu_e_a='';
$usu_e_b='';
$usu_e_c='';
$search='';
$uafsm='';
$uafsm_a='';
$uafsm_b='';
$ufc='';
$ufc_a='';
$ufc_b='';
?>
@endsection
@section('titulo','Registro/Control')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">

	<i class="ace-icon fa fa-users"></i>
	<li class="active">U. Serv Univ</li>
	<li class="active"><i class="ace-icon fa fa-list-alt"></i> Registro / Control</li>
</ul>
@endsection
@section('contenido')
@include('master.mensajes')
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		
		<div class="table-header">
			
				Registros - Asistencia Social
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
						{!! Form::open(['url' => 'asrcs/nuevo', 'method' => 'POST']) !!}
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
						<th>Escuela</th>
						<th>Edad</th>
						<th class="hidden-480">Caso social / otros</th>
					</tr>
				</thead>

				<tbody>
					@foreach($crs as $rc)
						<tr>
							<td class="center">{{$rc->created_at}}</td>
							<td>{{$rc->user->estudiante->cod_univ}}</td>
							<td>{{$rc->user->nombres.', '.$rc->user->apellido_paterno.' '.$rc->user->apellido_materno}}</td>
							<td class="hidden-480">{{$rc->user->estudiante->escuela->escuela}}</td>
							<td align="center">
								<?php 
								 if($rc->user->f_nac!='0000-00-00'){
                  					$fn= Carbon\Carbon::parse($rc->user->f_nac);
                  					echo Carbon\Carbon::createFromDate(
                  						$fn->format('Y'),
                  						$fn->format('m'),
                  						$fn->format('d')
                  					)->age;
                  				}
								//echo $rc->user->f_nac;
                  				?> 
							</td>
							<td>{{$rc->caso_social}}</td>
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
					  null, null,null, null, 
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