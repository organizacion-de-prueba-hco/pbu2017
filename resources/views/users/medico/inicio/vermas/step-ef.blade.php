<h2 class="StepTitle">IV. EXAMEN FÍSICO</h2>
			<hr>

<!--Modal Nuevo-->
<div id="procedimientos" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h3 class="smaller lighter blue no-margin">Registrar Nuevo Procedimeito</h3>
			</div>

			<div class="modal-body" align="center">
				{!! Form::open(['url' => 'jusuexpedientes/nuevo', 'method' => 'POST', 'class'=>'form-horizontal form-label-left']) !!}
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Cantidad</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="number" class="col-xs-12 col-sm-6" name="triaje_p" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Procedimiento</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="col-xs-12 col-sm-6" name="triaje_p" />
							</div>
						</div>
					</div>
				{!!Form::close()!!}
				<br>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--Fin modal Nuevo-->

		{!! Form::open(['url' => 'medmeds/triaje','method'=>'post', 'class'=>'form-horizontal form-label-left']) !!}								
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">TE: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Tiempo de enfermedad" name="triaje_fc" />
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">FI: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Forma de inicio" name="triaje_fr"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">CE: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" name="triaje_to" class="col-xs-12 col-sm-6" placeholder="Curso o evolución"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Relato Enf: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="El paciente describe lo que siente" name="triaje_pa"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Imp DX: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Describe el DX)"  name="triaje_p" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">TTO: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Descripción del Tratamiento" name="tto" />
											</div>
											<div>
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		
		<div class="table-header">
			<a href="#procedimientos" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal">
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
					
						<tr>
							<td class="center"></td>
							<td class="center"></td>
							
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a href="{{route('medmed.show','1')}}" class="tooltip-info" data-rel="tooltip" title="Ver más">
									<span class="blue">
										<i class="ace-icon fa fa-search-plus bigger-120"></i>
									</span>
									</a>
								</div>
							</td>
					</tr>
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
			<a href="#nuevo-exp" class="btn btn-success btn-xs btn-round" title="Nuevo" data-toggle="modal">
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
					
						<tr>
							<td class="center"></td>
							<td class="center"></td>
							<th class="center">Presentación</th>
							<th class="center">Indicaciones</th>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a href="{{route('medmed.show','1')}}" class="tooltip-info" data-rel="tooltip" title="Ver más">
									<span class="blue">
										<i class="ace-icon fa fa-search-plus bigger-120"></i>
									</span>
									</a>
								</div>
							</td>
					</tr>
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
												<input type="date" name="triaje_imc"/>
											</div>
										</div>
									</div>


									<div class="space-2"></div>
									
									<div class="space-2"></div>					
									<div class="hr hr-dotted"></div>
									<div align="center" ><br>
                          			<input type="hidden" name="user_id" value="{{$estudiante->user->id}}">
                          			<input type="hidden" name="medico_id" value="1">
                          			<input type="submit" value="Enviar datos" class="btn btn-info"><br><br></div>

									<div class="space-2"></div>
		{!! Form::close() !!}