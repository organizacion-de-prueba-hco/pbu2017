<?php use Carbon\Carbon; Carbon::setLocale('es');  ?>
<h2 class="StepTitle">I. FILIACIÓN</h2>
			<div align="center">
				<a href="#" title="Clic para actualizar foto" data-toggle="modal" 
                   data-target="#EditarFotoEstudiante" title="Editar">
				<span class="profile-picture">
					<img id="avatar" alt="avatar" src="{{url('imagenes/avatar/'.$user->foto)}}" height="170px;">
				</span>
				</a>
			</div><hr>
					{!! Form::open(['method'=>'post','id'=>'elformulario1-11','class'=>'form-horizontal form-label-left']) !!}
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Apellidos y Nombres:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" value="{{$user->apellido_paterno.' '.$user->apellido_materno.' '.$user->nombres}}" disabled="true"/>
											</div>
										</div>
									</div>
									@if($user->tipo_user=='5')
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Código:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" value="{{$user->estudiante->cod_univ}}" disabled="true"/>
											</div>
										</div>
									</div>
									@endif
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">DNI:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" maxlength="8" class="col-xs-12 col-sm-6" value="{{$user->dni}}" disabled="true"/>
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									@if($user->tipo_user=='5')
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Facultad:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('fa', $user->estudiante->escuela->facultad->facultad,['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...','disabled'=>'true'])!!}
											</div>
										</div>
									</div>
									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Escuela Profesional:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('fac', $user->estudiante->escuela->escuela,['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...','disabled'=>'true'])!!}
											</div>
										</div>
									</div>
									@endif
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Domicilio Actual:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('dom', $user->domicilio, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Nombre de la calle, Av. Jr, etc','disabled'=>'true'])!!}
											</div>
											<div class="clearfix">
												{!!Form::text('n_domicilio', $user->n_domicilio, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Número, Lt., Mz., etc','style'=>'margin-top: 2px;','disabled'=>'true'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Departamento de Nacimiento:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('departamento',$departamentos,$user->distrito_naci->provincia->departamento_id,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Departamento','disabled'=>'true'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Provincia de Nacimiento:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('provincia',$provincias,$user->distrito_naci->provincia->id,['required','id'=>'provincia_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Provincia','disabled'=>'true'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Distrito de Nacimiento:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('distrito_nac',$distritos,$user->distrito_nac,['required','id'=>'distrito_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Distrito' ,'disabled'=>'true'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Estado Civil: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('est_civil_id',$est_civils,$user->est_civil_id,['required', 'class'=>'col-xs-12 col-sm-6' ,'disabled'=>'true'])!!}
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Sexo:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" maxlength="8" class="col-xs-12 col-sm-6" disabled="true" 
													@if($user->genero=='0') 
														value="Femenino"
													@else
														value="Masculino"
													@endif
												/>
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Fecha de Nacimiento (edad):</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<label>
													{!!Form::date('f_nac',$user->f_nac,['required','class'=>'col-12','disabled'=>'true'])!!} 
													<?php 
													$fn= Carbon::parse($user->f_nac);
													if($user->f_nac< Carbon::now() && $user->f_nac!='0000-00-00' )
													{
														 echo "(".Carbon::createFromDate(
															$fn->format('Y'),
															$fn->format('m'),
															$fn->format('d')
														)->age.' años)';
													 }
													?>
												</label>
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">OCUPACIÓN:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">

												<input type="text" name="ocupacion" class="col-xs-12 col-sm-6" value="{{App\CuadroFamiliar::where('parentesco','YO')->where('user_id',$user->id)->first()->ocupacion}}" disabled='true'/>
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Religión:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('religion_id',$religiones,$user->religion_id,['required','id'=>'e_departamento', 'class'=>'col-xs-12 col-sm-6','disabled'=>'true'])!!}
											</div>
										</div>
									</div>
									
								{!! Form::close() !!}