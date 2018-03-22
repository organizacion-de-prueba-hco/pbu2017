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
	$v_i='';
	$v_ii='active';
	$v_iii='';
	$iv_iii='';
	$vi='';
	?>
@endsection
@section('titulo','Otros-Procedimiento')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-plus-square"></i>
	<li class="active">Otros</li>
	<li class="active">Procedimiento</li>
</ul>
@endsection
@section('contenido')
<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			<a href="#nuevo-proc" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
				Nuevo Procedimiento &nbsp;&nbsp;&nbsp;
		</div>
		
				<!--Modal procedimiento-->
		<div id="editar-procedimiento" class="modal fade" tabindex="-1">
			
		</div>
										<!--Fin modal procedimiento-->							


										<!--Modal Nuevo-->
		<div id="nuevo-proc" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="smaller lighter blue no-margin">Registrar Nuevo Procedimiento</h3>
					</div>
					{!! Form::open(['url' => 'enfotroprocs/nuevo', 'method' => 'POST']) !!}
					<div class="modal-body" align="center">
						<div class="item form-group">
						
						<div class="col-md-6 col-sm-6 col-xs-12">
                  	  <label>Procedimiento: </label><br>
                       <input type="text" placeholder="Procedimiento" class="nav-search-input" maxlength="10" required="required" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="procedimiento" style="width: 100%;">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-6" align="center">
							<label>Consultorio: </label><br>
							<select name="area" class="form-control">
								<option value="0">Medicina</option>
								<option value="1">Odontología</option>
							</select>
				 </div>
                  <div class="col-md-3 col-sm-3 col-xs-6" align="center">
							<label>Tarifa: </label><br>
							<input type="number" step="any" placeholder="Tarifa (S/)" required="required" name="tarifa"  class="form-control">
				 </div>
						
						<br>
					</div>
					</div>
					<br><br><br><br>
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
						<th class="center">Procedimiento</th>
						<th class="center">Consultorio</th>
						<th class="center">Tarifa S/</th>
						<th class="center">Editar</th>
					</tr>
				</thead>
				
				<tbody>
					@foreach($procedimiento as $proc)
						<tr>
							<td>{{$proc->procedimiento}}</td>
							@if($proc->area==0)
								<td class="center">Medicina</td>
							@else
								<td class="center">Odontología</td>
							@endif
							<td class="center">{{ number_format($proc->tarifa, 2, ".", ".")  }}</td>
							<td class="center">
								<div class="hidden-sm hidden-xs action-buttons">
								<a class="green cnter" href="#editar-procedimiento" data-toggle="modal" title="Editar" onclick="cargarModalEditar('{{$proc->id}}')" data-rel="tooltip">
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
					  { "bSortable": null },
					  null, null,
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
        var route="/enfotroproc/"+id+"/edit";
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',

          success: function(result){
            //console.log(result);
            $('#editar-procedimiento').html(result);
                             
          }                  
        });
      }





		</script>


@endsection