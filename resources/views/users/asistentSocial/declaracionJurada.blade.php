@extends('master.servicioSocial')
@section('activacion')
	<?php  
		$a='';$rcMenu=''; $b='active'; $c1=''; $c2='';$c='';$c3=''; $c4='';$d='';$d1=''; $d2=''; $d3=''; $d4='';$e='';
	?>
@endsection
@section('titulo','Declaración Jurada')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-comment"></i>	
	<li class="active">Declaración Jurada</li>
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
				Lista de Declaraciones Juradas &nbsp;&nbsp;&nbsp;
		</div>
										<!--Modal Nuevo-->
		<div id="nuevo-dj" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="smaller lighter blue no-margin">Registrar Nueva Declaración Jurada</h3>
											</div>
					<div class="modal-body" align="center">
							Ingrese Código Universitario del Estudiante<br>
							{!! Form::open(['url' => 'asdj/nuevo', 'method' => 'POST']) !!}
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

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Código Univ</th>
						<th>Estudiante</th>
						<th>Escuela</th>
						<th>Apoderado/Pariente</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($declaracionjuradas as $declaracionjurada)
						<tr>
							<td>{{$declaracionjurada->cuadrofamiliar->user->estudiante->cod_univ}}</td>
							<td>{{$declaracionjurada->cuadrofamiliar->user->nombres}} {{$declaracionjurada->cuadrofamiliar->user->apellido_paterno}} {{$declaracionjurada->cuadrofamiliar->user->apellido_materno}}</td>
							<td>
							{{$declaracionjurada->cuadrofamiliar->user->estudiante->escuela->escuela}}
							</td>
							<td>
							{{$declaracionjurada->cuadrofamiliar->parentesco}}: 
							{{$declaracionjurada->cuadrofamiliar->nombres}}
							</td>
							<td>
							<div class="hidden-sm hidden-xs action-buttons">
								<a class="orange" href="{{url('pdf/dj',$declaracionjurada->id)}}" target="_black" title="Descargar como PDF">
									<i class="ace-icon fa fa-file-pdf-o bigger-130"></i>
								</a>
								<a class="green" href="{{route('asdeclaracionjurada.edit',$declaracionjurada->id)}}" title="Editar" data-toggle='tooltip'>
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
										<a href="{{url('pdf/dj',$declaracionjurada->id)}}" class="tooltip-info" data-rel="tooltip" title="Descargar como PDF" target="_black">
											<span class="orange">
												<i class="ace-icon fa fa-file-pdf-o bigger-120"></i>
											</span>
										</a>
									</li>

									<li>
										<a href="#" class="tooltip-success" data-rel="tooltip" title="Editar">
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
					  { "bSortable": false },
					  null, null,null, 
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
