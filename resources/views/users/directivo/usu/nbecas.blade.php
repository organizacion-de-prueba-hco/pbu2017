@extends('master.directivo')
@section('activacion')
	<?php
$enc='';
$usu='active open';
$usu_a='';
$usu_b='';
$usu_c='active';
$usu_d='';
$usu_as='';
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
$usu_e='';
$search='';
?>
@endsection
@section('titulo','N° Becas')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-users"></i>
	<li class="active">U. Serv Univ</li>
	<li class="active"><i class="ace-icon fa fa-th-large "></i> N° Becas</li>
</ul>
@endsection
@section('contenido')
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<a href="{{route('jusunbecas.show')}}" style="position: relative; margin-top: -70px; z-index: 10;" class="btn btn-white btn-primary btn-bold" data-toggle="tooltip" data-placement="top" title="Exportar a Excel"><i class='fa fa-file-excel-o bigger-110 green'></i></a>
		
		<div class="table-header">
			Número de Becas por Escuela Profesional 
		</div>
			<!--Modal testear-->
		<div id="editar-becas" class="modal fade" tabindex="-1">
			
		</div>
										<!--Fin modal Testear-->
										
										
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Escuela Profesional</th>
						<th>N° Becas A</th>
						<th>N° Becas B</th>
						<th>N° Becas C</th>
						<th>Sub Total</th>
					</tr>
				</thead>

				<tbody>
					@foreach($cbecas as $nb)
						<tr>
							<td>{{$nb->escuela->escuela}}</td>
							<td>{{$nb->a}}</td>
							<td>{{$nb->b}}</td>
							<td>{{$nb->c}}</td>
							<td>{{$nb->a+$nb->b+$nb->c}}</td>
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
					  null, null, null,
					  { "bSortable": false }
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

		function cargarModalEditar(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        console.log(">"+id);
        var route="/jusunbecas/"+id;
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',

          success: function(result){
            //console.log(result);
            $('#editar-becas').html(result);
                             
          }                  
        });
      }

		</script>


@endsection