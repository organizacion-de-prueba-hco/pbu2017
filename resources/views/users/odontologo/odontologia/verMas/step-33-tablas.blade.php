
					<div class="space-2"></div><hr>
					<h3 class="lighter block green">3.4 Plan de tratamiento</h3>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right"></label>
						<div class="col-xs-12 col-sm-9">
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		
		<div class="table-header">
			<a href="#" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal" data-target="#procedimientos">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
				 Plan de tratamiento&nbsp;&nbsp;&nbsp;
		</div>
										
										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Cantidad</th>
						<th class="center">Procedimiento</th>
						<th class="center">Precio S/</th>
						<th></th>
					</tr>
				</thead>
				<?php  
					$ce = array('0' => 'Ninguno','1'=>'Victima de Violencia Política','2'=>'Consejo Universitario','3'=>'Asamblea Universitaria','4'=>'Deportista Calificado' );
				?>
				<tbody>
					@foreach($ops as $op)
						<tr>
							<td class="center">{{$op->cantidad}}</td>
							<td class="center">{{$op->cmprocedimiento->procedimiento}}</td>
							<td class="center">{{$op->cmprocedimiento->tarifa}}</td>
							<td>
								<div class="action-buttons" align="center">
									<a href="#" class="tooltip-info" title="Actualizar" data-toggle="modal" data-target="#aprocedimientos" onclick="cargarProcedimientos('{{$op->id}}')">
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
						</div>
					</div>

					<div class="space-2"></div><hr>
					<h3 class="lighter block green">3.5 Medicamentos</h3>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right"></label>
						<div class="col-xs-12 col-sm-9">
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		
		<div class="table-header">
			<a href="#" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal" data-target="#medicamentos">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
				 Medicamentos&nbsp;&nbsp;&nbsp;
		</div>
										
										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Cantidad</th>
						<th class="center">Medicamento - Presentacion</th>
						<th class="center">Indicación</th>
						<th></th>
					</tr>
				</thead>
				<?php  
					$ce = array('0' => 'Ninguno','1'=>'Victima de Violencia Política','2'=>'Consejo Universitario','3'=>'Asamblea Universitaria','4'=>'Deportista Calificado' );
				?>
				<tbody>
					@foreach($oms as $om)
						<tr>
							<td class="center">{{$om->cantidad}}</td>
							<td class="center">{{$om->medicamento->medicamento.' - '.$om->medicamento->presentacion}}</td>
							<td class="center">{{$om->indicaciones}}</td>
							
							<td>
								<div class="hidden-sm hidden-xs action-buttons" align="center">
									<a href="#" class="tooltip-info" title="Actualizar" data-toggle="modal" data-target="#amedicamentos" onclick="cargarMedicamentos('{{$om->id}}')">
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
						</div>
					</div>

					<div class="space-2"></div><hr>
					<h3 class="lighter block green">3.6 Atenciones</h3>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right"></label>
						<div class="col-xs-12 col-sm-9">
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		
		<div class="table-header">
			<a href="#" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal" data-target="#atenciones">
				<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
			</a>
				 Atenciones&nbsp;&nbsp;&nbsp;
		</div>
										
										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">Fecha</th>
						<th class="center">Procedimiento</th>
						<th class="center">Observación</th>
						<th class="center">Próxima Cita</th>
						<th></th>
					</tr>
				</thead>
				<?php  
					$ce = array('0' => 'Ninguno','1'=>'Victima de Violencia Política','2'=>'Consejo Universitario','3'=>'Asamblea Universitaria','4'=>'Deportista Calificado' );
				?>
				<tbody>
					@foreach($ots as $ot)
						<tr>
							<td class="center">{{$ot->created_at}}</td>
							<td class="center">{{$ot->cmprocedimiento->procedimiento}}</td>
							<td class="center">{{$ot->obs}}</td>
							<td class="center">{{$ot->prox_cita}}</td>
							<td>
								<div class="action-buttons" align="center">
									<a href="#" class="tooltip-info" title="Actualizar" data-toggle="modal" data-target="#aatenciones" onclick="cargarAtenciones('{{$ot->id}}')">
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
						</div>
					</div>