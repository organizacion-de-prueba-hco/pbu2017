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
	$v='active open';
	$v_i='active';
	$v_ii='';
	$v_iii='';
	$iv_iii='';
	$vi='';
	?>
@endsection
@section('titulo','Otros-Inventario')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-plus-square"></i>
	<li class="active">Otros</li>
	<li class="active">Inventario</li>
</ul>
@endsection
@section('contenido')
<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>		
		<div class="table-header">
			<a href="#nuevo-inv" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
				Inventario &nbsp;&nbsp;&nbsp;
		</div>
										
		<!--Modal editar-inventario -->
		<div id="editar-inventario" class="modal fade" tabindex="-1">
			
		</div>
										<!--Fin modal editar-inventario-->	


										<!--Modal Nuevo-->
		<div id="nuevo-inv" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="smaller lighter blue no-margin">Registrar Nuevo Artículo</h3>
					</div>
					{!! Form::open(['url' => 'enfotroinvs/nuevo', 'method' => 'POST']) !!}
					<div class="modal-body" align="center">
						<div class="item form-group">
						
						<div class="col-md-4 col-sm-4 col-xs-4">
                          <label>Nombre:<tab>	</label>
                          <input type="text" placeholder="Nombre" class="nav-search-input" maxlength="50" required="required" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="nom" >
									
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <label>Descripción:<tab>	</label>
                          <input type="text" placeholder="Descripción" class="nav-search-input" maxlength="80" required="required" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="desc" >
									
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-4" align="center">
							<label>Cantidad: </label>
							<input type="number" placeholder="Cantidad" required="required" name="cant" >
						</div>
						<br>
					</div>
					</div>

					<br><br>
					<div class="modal-footer">
						<input type="submit" class="btn btn-sm btn-success" value="Nuevo">
					<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">Cancelar
					</button>
					</div>
					{!!Form::close()!!}
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
						<th class="center">Nombre</th>
						<th class="center">Descripción</th>
						<th>Cantidad</th>
						<th>Editar</th>
					</tr>
				</thead>
				
				<tbody>
					@foreach($inventario as $med)
						<tr>
							<td class="center">{{$med->nombre}}</td>
							<td class="center">{{$med->descripcion}}</td>
							<td> {{$med->cantidad}}</td>						
							<td align="center">
							  <div class="hidden-sm hidden-xs action-buttons">
								<a class="green" href="#editar-inventario" data-toggle="modal" title="Editar" onclick="cargarModalEditar('{{$med->id}}')" data-rel="tooltip">
								<i class="ace-icon fa fa-pencil bigger-130"></i>
								</a>
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
					"language":{"url":'{!! asset('/assets/js/latino.json') !!}'},
					bAutoWidth: false,
					"aoColumns": [
					  null, null,null,
					  { "bSortable": false }
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


		function cargarModalEditar(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        //console.log(">"+id);
        var route="/enfotroinv/"+id+"/edit";
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',

          success: function(result){
            //console.log(result);
            $('#editar-inventario').html(result);
                             
          }                  
        });
      }


		</script>


@endsection