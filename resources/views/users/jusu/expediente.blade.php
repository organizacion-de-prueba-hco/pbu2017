@extends('master.jusu')
@section('activacion')
	<?php
$oa = 'active';
$nbecas='';
$enc='';
$in='';
?>
@endsection
@section('titulo','Expedientes')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-list-alt"></i>
	<li class="active">Expedientes</li>
</ul>
@endsection
@section('contenido')
@include('users.jusu.reporte-asistencia')
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<a href="{{url('jusuexpedientes/reporte')}}" style="position: relative; margin-top: -70px; z-index: 10;" class="btn btn-white btn-primary btn-bold" data-toggle="tooltip" data-placement="top" title="Comensales aprobados"><i class='fa fa-file-excel-o bigger-110 green'></i></a>
		<a href="#asistencia" data-toggle="modal" style="position: relative; margin-top: -70px; z-index: 10;" class="btn btn-white btn-primary btn-bold" data-toggle="tooltip" data-placement="top" title="Reporte de Asistencias y Faltas"><i class='fa fa-table bigger-110 blue'></i></a>
		
		<div class="table-header">
			<a href="#nuevo-exp" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
				Comensales &nbsp;&nbsp;&nbsp;
			<a href="#testear" data-toggle="modal"><span class="btn btn-warning btn-xs btn-round">Testear Estudiante</span></a>
		</div>
										<!--Modal Nuevo-->
		<div id="nuevo-exp" class="modal fade" tabindex="-1">
								<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin">Registrar Nuevo Expediente</h3>
											</div>

											<div class="modal-body" align="center">
												Ingrese Código Universitario del Estudiante<br>
													{!! Form::open(['url' => 'jusuexpedientes/nuevo', 'method' => 'POST']) !!}
															<span class="input-icon">
																<input type="number" placeholder="Buscar ..." class="nav-search-input" maxlength="10"
																required="required"
																oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
																name="cod-nuevo"
																>
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
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
										<!--Fin modal Testear-->

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Cod. Univ</th>
						<th>Nombres y Apellidos</th>
						<th>Escuela</th>
						<th class="hidden-480">CE</th>
						<th>Beca</th>
						<th class="hidden-480">Estado</th>

						<th></th>
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



			jQuery(function($) {

			    var myTable=$('#dynamic-table-2').DataTable( {
			        "processing": true,
			        "serverSide": true,
			        "ajax": '{!!url('jusuexpedientes/mostrartablas')!!}',
			        "language":{"url":'{!! asset('/assets/js/latino.json') !!}'
                  } ,
			        "columns" : [
				        {data:"cod_univ"},
				        {data:"nombres"},
				        {data:"escuela"},
				        {data:null, render: 
				        	function ( data, type, row ) {
				        		var arreglo_ce = ['Ninguno','Victima de Violencia Política','Consejo Universitario','Asamblea Universitaria','Deportista Calificado'];
                				return arreglo_ce[data.caso_esp]
                			}
                		},
                		{data:"tipo_beca"},
				        {data:null, render: 
				        	function ( data, type, row ) {
				        		if(data.estado=='1'){
                					return "<span class='label label-sm label-success'>	Activo</span>"
                				}else{
                					return "<span class='label label-sm label-warning'>Inactivo</span>"
                				}
                			}
                		},
				        {data:null, render: 
				        	function ( data, type, row ) {
				        		//return data.expediente;
                				return "<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='/jusuexpediente/"+data.expediente+"' title='Ver más'><i class='ace-icon fa fa-search-plus bigger-130'></i></a><a class='green' href='/jusuexpediente/"+data.expediente+"/edit'><i class='ace-icon fa fa-pencil bigger-130'></i></a></div>" +

							"<div class='hidden-md hidden-lg'><div class='inline pos-rel'><button class='btn btn-minier btn-yellow dropdown-toggle' data-toggle='dropdown' data-position='auto'><i class='ace-icon fa fa-caret-down icon-only bigger-120'></i></button><ul class='dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close'><li><a href='/jusuexpediente/"+data.expediente+"' class='tooltip-info' data-rel='tooltip' title='Ver más'><span class='blue'><i class='ace-icon fa fa-search-plus bigger-120'></i> </span></a></li><li><a href='/jusuexpediente/"+data.expediente+"/edit' class='tooltip-success' data-rel='tooltip' title='Editar'><span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a></li></ul></div></div>";
                			}
                		}
			        ]
			    } );

				//initiate dataTables plugin
			



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

				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});


				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {

					defaultColvisAction(e, dt, button, config);


					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});

				////

				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);





				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );




				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header

					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});

				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});



				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});



				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header

					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});



				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}




				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/





				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/


			})

		//Para que salga las letritas negras del title
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
		</script>


@endsection