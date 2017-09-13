<?php use Carbon\Carbon; Carbon::setLocale('es');  ?>
<h2 class="StepTitle">III. TRIAJE</h2>
			<hr>
					{!! Form::open(['method'=>'post','id'=>'elformulario1-t','class'=>'form-horizontal form-label-left']) !!}
								<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
									
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">FC: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" value="" placeholder="Frecuencia cardiaca (X')" />
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">FR: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" maxlength="8" name="dni" class="col-xs-12 col-sm-6" placeholder="Frecuencia respiratoria (X')"  value=""/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">T°: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" maxlength="8" name="dni" class="col-xs-12 col-sm-6" placeholder="Temperatura (°C)"  value=""/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">P/A: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" maxlength="8" name="dni" class="col-xs-12 col-sm-6" placeholder="Presión arterial (mmHg)" value=""/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">P: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" maxlength="8" name="dni" class="col-xs-12 col-sm-6" placeholder="Peso (Kg)"  value=""/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">T: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" maxlength="8" name="dni" class="col-xs-12 col-sm-6" placeholder="Talla (Cm)"  value=""/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">IMC: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" maxlength="8" name="dni" class="col-xs-12 col-sm-6" placeholder="Kg/m2sc" value=""/>
											</div>
										</div>
									</div>


									<div class="space-2"></div>
									
									<div class="space-2"></div>					
									<div class="hr hr-dotted"></div>
									<div align="center" ><br>
                          			<input type="hidden" name="id" value="{{$estudiante->user->id}}">
                          			<input type="submit" value="Enviar datos" class="btn btn-info" onclick="lafuncion('/fichasocial/general','#elformulario1-1','#step-11')"><br><br></div>

									<div class="space-2"></div>
								{!! Form::close() !!}