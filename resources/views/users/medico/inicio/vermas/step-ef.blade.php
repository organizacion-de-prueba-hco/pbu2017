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
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Descripción del Tratamiento" name="tto_descripcion" value="{{$medicina->tto_descripcion}}" />
											</div>
									<div id="div-de-tablas">
										@include('users.medico.inicio.verMas.step-ef-tablas')	
									</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Examen Aulxiliar: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" name="ex_aux" value="{{$medicina->ex_aux}}" class="col-xs-12 col-sm-6" placeholder="Opcional" />
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