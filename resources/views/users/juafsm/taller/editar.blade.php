@extends('master.juafsm')
@section('activacion')
	<?php
$a = '';
$b='active';
$c='';
?>
@endsection
@section('titulo','Editar Taller')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-list-alt"></i>
	<li class="active">Talleres</li>
	<li class="active">Editar</li>
</ul>
@endsection
@section('contenido')

								<br>
{!!Form::model($taller,['route' => ['jufsmtaller.update',$taller->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}

		

      <div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Taller </label>
				<div class="col-sm-9">
				 	{!!Form::select('taller',$talleres,$taller->taller_id,['required', 'class'=>'col-xs-10 col-sm-5'])!!}
				</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-12 col-sm-3 no-padding-right">Docente</label>
				<div class="col-xs-12 col-sm-9">
					<div class="clearfix">
						{!!Form::text('docente',null,['required', 'class'=>'col-xs-10 col-sm-5','placeholder' => 'Nombres y Apellidos'])!!}
					</div>
					</div>
		</div>
							
	

									<div class="form-group" >
										<div class="col-sm-6">
											<button type="submit" class="width-35 pull-right btn btn-sm btn-primary col-xs-10 col-sm-5">
											<i class="ace-icon fa fa-cog" ></i>
											<span class="bigger-110">Actualizar </span>
											</button>
										</div>
									</div>
			                    {!! Form::close() !!}


								</div><!-- PAGE CONTENT ENDS -->


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
		</script>
@endsection