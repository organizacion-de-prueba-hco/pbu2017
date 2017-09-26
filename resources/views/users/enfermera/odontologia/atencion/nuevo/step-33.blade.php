<?php use Carbon\Carbon; Carbon::setLocale('es');  ?>
<h2 class="StepTitle">III. Estado de Salud General</h2>
			<hr>
					{!! Form::open(['url' => 'enfodontos/registrar','method'=>'post', 'class'=>'form-horizontal form-label-left']) !!}								
					<div class="space-2"></div>
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
									
									<div align="center" ><br>
                          			<input type="hidden" name="user_id" value="{{$estudiante->user->id}}">
                          			<input type="hidden" name="odontologo_id" value="1">
                          			<input type="submit" value="Enviar datos" class="btn btn-info"><br><br></div>

									<div class="space-2"></div>
								{!! Form::close() !!}