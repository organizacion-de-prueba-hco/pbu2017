<?php use Carbon\Carbon; Carbon::setLocale('es');  ?>
<h2 class="StepTitle">III. Odontología</h2>
			<hr>
					{!! Form::open(['url' => 'enfodontos/registrar','method'=>'post', 'class'=>'form-horizontal form-label-left']) !!}	
												
					<div class="space-2"></div><hr>
					<h3 class="lighter block green">3.1 Motivo de Consulta</h3>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Motivo de Consulta:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="col-xs-12 col-sm-6" value="{{$estudiante->user->apellido_paterno.' '.$estudiante->user->apellido_materno.' '.$estudiante->user->nombres}}" placeholder="Describir el motivo de la consulta" />
							</div>
						</div>
					</div>
					<div class="space-2"></div><hr>
					<h3 class="lighter block green">3.2 Estado de salud General</h3>
						<div class="form-group">
							<div class="col-xs-12 col-sm-9">
								<label>
									<input name="ii_a" class="ace" type="checkbox" value="1"/>
									<span class="lbl"> Presenta alguna enfermedad sistemica actualmente</span>
								</label><br>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl"> Presenta alguna enfermedad sistemica anteriormente</span>
								</label><br>
								<label>
									<input name="ii_c" value="1" type="checkbox" class="ace"/>
									<span class="lbl"> Alergico a algún medicamento o sustencia</span>
								</label><br>
								<label>
									<input name="ii_d" value="1" type="checkbox" class="ace"/>
									<span class="lbl"> Antecedentes de operaciones</span>
								</label><br>
							</div>
						</div>
					<div class="space-2"></div><hr>
					<h3 class="lighter block green">3.3 Examen de salud Bucodental</h3>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">a) Examen Odontológico: </label><br>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix" align="center">
								<img src="{{URL::to('imagenes/odontograma.png')}}">
							</div>
							<div class="clearfix" align="center">
								<label>
									<input name="ii_a" class="ace" type="checkbox" value="1"/>
									<span class="lbl">18 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">17 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">16 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">15 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">14 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">13 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">12 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">11&nbsp;&nbsp;-&nbsp;&nbsp;</span>
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">21 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">22 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">23 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">24 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">25 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">26 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">27 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">28 </span> &nbsp;
								</label><br>

								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">55 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">54 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">53 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">52 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">51&nbsp;&nbsp;-&nbsp;&nbsp;</span>
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">61 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">62 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">63 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">64 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">65 </span> &nbsp;
								</label><br>

								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">85 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">84 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">83 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">82 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">81&nbsp;&nbsp;-&nbsp;&nbsp;</span>
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">71 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">72 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">73 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">74 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">75 </span> &nbsp;
								</label><br>

								<label>
									<input name="ii_a" class="ace" type="checkbox" value="1"/>
									<span class="lbl">48 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">47 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">46 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">45 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">44 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">43 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">42 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">41&nbsp;&nbsp;-&nbsp;&nbsp;</span>
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">31 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">32 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">33 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">34 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">35 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">36 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">37 </span> &nbsp;
								</label>
								<label>
									<input name="ii_b" value="1" class="ace" type="checkbox"/>
									<span class="lbl">38 </span> &nbsp;
								</label><br>
							</div>
						</div>
					</div>

					<div class="space-2"></div><hr>
					<h3 class="lighter block green">3.4 Diagnóstico</h3>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Motivo de Consulta:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="col-xs-12 col-sm-6" value="{{$estudiante->user->apellido_paterno.' '.$estudiante->user->apellido_materno.' '.$estudiante->user->nombres}}" placeholder="Describir el motivo de la consulta" />
							</div>
						</div>
					</div>

					<div class="space-2"></div><hr>
					<h3 class="lighter block green">3.5 Plan de tratamiento</h3>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Motivo de Consulta:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="col-xs-12 col-sm-6" value="{{$estudiante->user->apellido_paterno.' '.$estudiante->user->apellido_materno.' '.$estudiante->user->nombres}}" placeholder="Describir el motivo de la consulta" />
							</div>
						</div>
					</div>
									
									<div align="center" ><br>
                          			<input type="hidden" name="user_id" value="{{$estudiante->user->id}}">
                          			<input type="hidden" name="odontologo_id" value="1">
                          			<input type="submit" value="Enviar datos" class="btn btn-info"><br><br></div>

									<div class="space-2"></div>
								{!! Form::close() !!}