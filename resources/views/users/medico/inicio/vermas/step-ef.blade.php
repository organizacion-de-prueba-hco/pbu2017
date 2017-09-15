<h2 class="StepTitle">IV. EXAMEN FÍSICO</h2>
			<hr>



		{!! Form::open(['url' => 'medmeds/ef','method'=>'post', 'class'=>'form-horizontal form-label-left']) !!}								
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">TE: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Tiempo de enfermedad" name="te" value="{{$medicina->te}}" />
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">FI: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Forma de inicio" name="fi" value="{{$medicina->fi}}" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">CE: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" name="ce" class="col-xs-12 col-sm-6" placeholder="Curso o evolución" value="{{$medicina->ce}}" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Relato Enf: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="El paciente describe lo que siente" name="relato_enf" value="{{$medicina->relato_enf}}" required="true"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Imp DX: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Describe el DX"  name="imp_dx" value="{{$medicina->imp_dx}}" required="true" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">TTO: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Descripción del Tratamiento" name="tto_descripcion" {{$medicina->tto_descripcion}} />
											</div>
											<div>
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

											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Próxima Cita: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="date" name="cita" value="{{$medicina->cita}}" />
											</div>
										</div>
									</div>


									<div class="space-2"></div>
									
									<div class="space-2"></div>					
									<div class="hr hr-dotted"></div>
									<div align="center" ><br>
                          			<input type="hidden" name="user_id" value="{{$estudiante->user->id}}">
                          			<input type="hidden" name="medico_id" value="{{Auth::user()->id}}">
                          			<input type="hidden" name="m_id" value="{{$medicina->id}}">
                          			<input type="submit" value="Enviar datos" class="btn btn-info"><br><br></div>

									<div class="space-2"></div>
		{!! Form::close() !!}