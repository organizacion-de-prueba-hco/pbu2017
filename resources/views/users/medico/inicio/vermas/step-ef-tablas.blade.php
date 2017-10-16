<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		
		<div class="table-header">
			<a href="#" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal" data-target="#procedimientos">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
				Procedimientos &nbsp;&nbsp;&nbsp;
		</div>
										
										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Cantidad</th>
						<th class="center">Procedimiento</th>
						<th></th>
					</tr>
				</thead>
				<?php  
					$ce = array('0' => 'Ninguno','1'=>'Victima de Violencia Política','2'=>'Consejo Universitario','3'=>'Asamblea Universitaria','4'=>'Deportista Calificado' );
				?>
				<tbody>
					@foreach($mps as $mp)
						<tr>
							<td class="center">{{$mp->cantidad}}</td>
							<td class="center">{{$mp->cmprocedimiento->procedimiento}}</td>
							
							<td>
								<div class="hidden-sm hidden-xs action-buttons" align="center">
									<a href="#" class="tooltip-info" title="Actualizar" data-toggle="modal" data-target="#aprocedimientos" onclick="cargarProcedimientos('{{$mp->id}}')">
									<span class="blue">
										<i class="ace-icon fa  fa-pencil-square-o bigger-120"></i>
									</span>
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
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		
		<div class="table-header">
			<a href="#" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal" data-target="#medicamentos">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
				Medicamentos &nbsp;&nbsp;&nbsp;
		</div>
										
										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Cantidad</th>
						<th class="center">Nombre</th>
						<th class="center">Presentación</th>
						<th class="center">Indicaciones</th>
						<th></th>
					</tr>
				</thead>
				<?php  
					$ce = array('0' => 'Ninguno','1'=>'Victima de Violencia Política','2'=>'Consejo Universitario','3'=>'Asamblea Universitaria','4'=>'Deportista Calificado' );
				?>
				<tbody>
					@foreach($mms as $m)
						<tr>
							<td class="center">{{$m->cantidad}}</td>
							<td class="center">{{$m->medicamento->medicamento}}</td>
							<td class="center">{{$m->medicamento->presentacion}}</td>
							<td class="center">{{$m->indicaciones}}</td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons" align="center">
									<a href="#" class="tooltip-info" title="Actualizar" data-toggle="modal" data-target="#amedicamentos" onclick="cargarMedicamentos('{{$m->id}}')">
									<span class="blue">
										<i class="ace-icon fa  fa-pencil-square-o bigger-120"></i>
									</span>
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