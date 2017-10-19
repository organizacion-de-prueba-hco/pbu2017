@extends('master.medico')
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
	$iv='';
	$iv_i='';
	$iv_ii='';
	$v='active open';
	$v_i='';
	$v_ii='';
	$v_iii='active';
	$iv_iii='';
	$vi='';
	?>
@endsection
@section('titulo','Exoneración')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-medkit"></i>	
	<li class="active">Exoneración de pago para atención en el centro médico UNHEVAL</li>
</ul>
@endsection
@section('contenido')
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
				
		<div class="table-header">
				Lista de Exoneraciones de Pago al Centro Médico &nbsp;&nbsp;&nbsp;
			
		</div>
	
										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Cód Exoneración</th>
						<th >Cód Estudiante</th>
						<th>Estudiante</th>
						<th>Escuela</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($exoneraciones as $exoneracion)
						<tr>
							<td class="center">{{$exoneracion->created_at}}</td>
							<td align="center">EPCM-{{$exoneracion->id}}</td>
							<td align="center">{{$exoneracion->estudiant->cod_univ}}</td>
							<td>{{$exoneracion->estudiant->user->nombres}} {{$exoneracion->estudiant->user->apellido_paterno}} {{$exoneracion->estudiant->user->apellido_materno}}</td>
							<td>{{$exoneracion->estudiant->escuela->escuela}}</td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="orange" href="{{url('pdf/exoneracion',$exoneracion->id)}}" target="_blank" title="Ver en PDF">
										<i class="ace-icon fa fa-file-pdf-o bigger-130"></i>
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
										<a href="{{url('pdf/exoneracion',$exoneracion->id)}}" class="tooltip-info" data-rel="tooltip" target="_blank" title="Ver en PDF">
											<span class="orange">
												<i class="ace-icon fa fa-file-pdf-o bigger-120"></i>
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