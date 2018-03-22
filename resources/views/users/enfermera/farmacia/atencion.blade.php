@extends('master.enfermera')
@section('activacion')
	<?php
	$i ='';
	$ii='';
	$ii_i='';
	$ii_ii='';
	$ii_iii='';
	$ii_iv='';
	$iii='';
	$iii_i='';
	$iii_ii='';
	$iv='active open';
	$iv_i='active';
	$iv_ii='';
	$v='';
	$v_i='';
	$v_ii='';
	$iv_iii='';
	$v_iii='';
	$vi='';
	?>
@endsection
@section('titulo','Farmacia-Atención')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-medkit"></i>
	<li class="active">Farmacia</li>
	<li class="active">Atención Medicina</li>
</ul>
@endsection
@section('contenido')
<div class="row">
	<div class="col-xs-12">		
		<div class="table-header">
				Farmacia - Medicina&nbsp;&nbsp;&nbsp;
		</div>
										
										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Fecha</th>
						<th class="center">DNI</th>
						<th>Nombres</th>
						<th>Tipo</th>
						<th class="center">Medicamento</th>
						<th>Cantidad</th>
						<th>Estado</th>
					</tr>
				</thead>
				
				<tbody>
					@foreach($medmed as $med)
						<tr>
							<td class="center">{{$med->created_at}}</td>
							<td class="center">{{$med->cmmedicina->user->dni}}</td>
							<td> {{$med->cmmedicina->user->apellido_paterno.' '.$med->cmmedicina->user->apellido_materno.' '.$med->cmmedicina->user->nombres}}</td>
							<td>
								@if($med->cmmedicina->user->tipo_user=='5')
									Estudiante
								@else
									No Estudiante
								@endif
							</td>
							<td>{{$med->medicamento->medicamento.' - '.$med->medicamento->presentacion}}</td>
							
							<td class="center">
							{{$med->cantidad}}
							</td>
							<td>
							@if($med->estado=='1')
                            {!!Form::open(['route'=>['enffarm.update', $med->id], 'method'=>'PUT'])!!} 
                              <input type="hidden" name="estado" value="0">
                              <input type="hidden" name="oficina" value="1">
                              <button class="submit btn btn-success btn-xs"" title="Clic para Cambiar" 
                              onclick="javascript:return conf('Desactivar');"> 
                              Atendido</button>
                            {!!Form::close() !!}
                            @else
                            {!!Form::open(['route'=>['enffarm.update', $med->id], 'method'=>'PUT'])!!} 
                              <input type="hidden" name="estado" value="1">
                              <input type="hidden" name="oficina" value="1">
                              <button class="submit btn btn-danger btn-xs"" title="Clic para Cambiar" 
                              onclick="javascript:return conf('Activar');"> 
                              Pendiente</button>
                            {!!Form::close() !!}
                          	@endif
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
					"language":{"url":'{!! asset('/assets/js/latino.json') !!}'},
					"order": [[ 0, "desc" ]],
					"aoColumns": [
					  { "bSortable": null },
					  null, null,null, null,null,
					  { "bSortable": false }
					],
			    } );

			})

		//Para que salga las letritas negras del title
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
		//
		function conf(msj){
    		confirmar = confirm('¿Seguro que deseas cambiar este estado?');
    		return confirmar;
  		}
		</script>


@endsection