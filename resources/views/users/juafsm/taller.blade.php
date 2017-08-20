@extends('master.juafsm')
@section('activacion')
	<?php
$oa = '';
$nbecas='';
$enc='';
$in='active';
?>
@endsection
@section('titulo','Talleres')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-list-alt"></i>
	<li class="active">Talleres</li>
</ul>
@endsection
@section('contenido')

	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			<a href="{{route('jufsmtaller.create')}}" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a> &nbsp;
				Talleres &nbsp;&nbsp;&nbsp;
			</div>
												

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Taller</th>
						<th class="center">Semestre</th>
						<th class="center">Docente</th>
						<th class="center"></th>
					</tr>
				</thead>

				<tbody>
					@foreach($talleres as $t)
					<tr>
						<td>{{$t->taller->taller}}</td>
						<td>{{$t->semestre}}</td>
						<td>{{$t->docente}}</td>
						<td class="action-buttons" align="center">
						<a href="{{route('jufsmtaller.edit',$t)}}" data-toggle="tooltip" title="Editar">
							<span class="green">
								<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
							</span>
							</a>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
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
		
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable =
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": null},
					  null, null,
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