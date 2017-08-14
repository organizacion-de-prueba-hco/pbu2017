@extends('master.servicioSocial')
@section('activacion')
	<?php  
		$a='';$rcMenu=''; $b=''; $c=''; $c1=''; $c2='';$c3=''; $c4='';$d='active open';$d1='active'; $d2=''; $d3=''; $d4='';$e='';
	?>
@endsection
@section('titulo','Visita Hospitalia')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-home"></i>	
	<li class="active">Visita Hospitalia</li>
	<li class="active">Estudiante</li>
</ul>
@endsection
@section('contenido')
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>		
		
		<div class="table-header">
			<a href="#nuevo-dj" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
			
		</div>
										<!--Modal Nuevo-->
		<div id="nuevo-dj" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="smaller lighter blue no-margin">Registrar Nueva Visita Domiciliaria</h3>
											</div>
					<div class="modal-body" align="center">
							Ingrese Código Universitario del Estudiante<br>
							{!! Form::open(['url' => 'asvisitahosp1s/nuevo', 'method' => 'POST']) !!}
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

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Código Univ</th>
						<th>Estudiante</th>
						<th>Escuela</th>
						<th>Visita a</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($visitah as $vd)
						<tr>
							<td>{{$vd->created_at}}</td>
							<td>{{$vd->cuadrofamiliar->user->estudiante->cod_univ}}</td>
							<td>{{$vd->cuadrofamiliar->user->nombres}} {{$vd->cuadrofamiliar->user->apellido_paterno}} {{$vd->cuadrofamiliar->user->apellido_materno}}</td>
							<td>
							{{$vd->cuadrofamiliar->user->estudiante->escuela->escuela}}
							</td>
							<td>
							@if($vd->cuadrofamiliar->parentesco=='YO')
							{{$vd->cuadrofamiliar->nombres}}
							@else
							{{$vd->cuadrofamiliar->parentesco}}: {{$vd->cuadrofamiliar->nombres}}
							@endif
							
							</td>
							<td>
							<div class="hidden-sm hidden-xs action-buttons">
								<a class="orange" href="{{url('pdf/visitahospitalaria',$vd->id)}}" target="_black" title="Descargar como PDF">
									<i class="ace-icon fa fa-file-pdf-o bigger-130"></i>
								</a>
								<a class="green" href="{{route('asvisitahosp1.edit',$vd->id)}}" title="Editar" data-toggle='tooltip'>
									<i class="ace-icon fa fa-pencil bigger-130"></i>
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
										<a href="{{url('pdf/visitahospitalaria',$vd->id)}}" class="tooltip-info" data-rel="tooltip" title="Descargar como PDF" target="_black">
											<span class="orange">
												<i class="ace-icon fa fa-file-pdf-o bigger-120"></i>
											</span>
										</a>
									</li>

									<li>
										<a href="{{route('asvisitahosp1.edit',$vd->id)}}" class="tooltip-success" data-rel="tooltip" title="Editar">
											<span class="green">
												<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
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
