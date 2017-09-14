<?php use Carbon\Carbon; Carbon::setLocale('es');  ?>
<h2 class="StepTitle">III. TRIAJE</h2>
			<hr>
				{!! Form::open(['method'=>'post','id'=>'elformulario1-2','class'=>'form-horizontal form-label-left']) !!}								
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">FC: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Frecuencia cardiaca (X')" name="triaje_fc" value="{{$medicina->triaje_fc}}" />
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">FR: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Frecuencia respiratoria (X')" name="triaje_fr" value="{{$medicina->triaje_fr}}"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">T°: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" name="triaje_to" class="col-xs-12 col-sm-6" placeholder="Temperatura (°C)" value="{{$medicina->triaje_to}}"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">P/A: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Presión arterial (mmHg)" name="triaje_pa" value="{{$medicina->triaje_pa}}"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">P: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Peso (Kg)"  name="triaje_p" value="{{$medicina->triaje_p}}"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">T: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Talla (Cm)" name="triaje_t" value="{{$medicina->triaje_t}}"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">IMC: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" placeholder="Kg/m2sc" name="triaje_imc" value="{{$medicina->triaje_imc}}"/>
											</div>
										</div>
									</div>


									<div class="space-2"></div>
									
									<div class="space-2"></div>					
									<div class="hr hr-dotted"></div>
									<div align="center" ><br>
                          			<input type="hidden" name="user_id" value="{{$estudiante->user->id}}">
                          			<input type="hidden" name="medico_id" value="1">
                          			<input type="submit" value="Actualizar" class="btn btn-info" onclick="lafuncion('/enfmeds/antecedentes','#elformulario1-2','#step-22')">
            						</div>

									<div class="space-2"></div>
								{!! Form::close() !!}