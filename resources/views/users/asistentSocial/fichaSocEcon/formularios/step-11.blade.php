<?php use Carbon\Carbon; Carbon::setLocale('es');  ?>
<h2 class="StepTitle">I. DATOS GENERALES DEL ALUMNO</h2>
			<div align="center">
				<a href="#" title="Clic para actualizar foto" data-toggle="modal" 
                   data-target="#EditarFotoEstudiante" title="Editar">
				<span class="profile-picture">
					<img id="avatar" alt="avatar" src="{{url('imagenes/avatar/'.$user->foto)}}" height="170px;">
				</span>
				</a>
			</div><hr>
								{!! Form::open(['method'=>'post','id'=>'elformulario1-1','class'=>'form-horizontal form-label-left']) !!}
								<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Apellidos y Nombres:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" value="{{$user->apellido_paterno.' '.$user->apellido_materno.' '.$user->nombres}}" disabled="true"/>
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Código:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" value="{{$user->estudiante->cod_univ}}" disabled="true"/>
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">DNI:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" maxlength="8" name="dni" class="col-xs-12 col-sm-6" value="{{$user->dni}}"/>
											</div>
										</div>
									</div>
									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Fecha de Nacimiento (edad):</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<label>
													{!!Form::date('f_nac',$user->f_nac,['required','class'=>'col-12'])!!} 
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
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Departamento de Nacimiento:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('departamento',$departamentos,$user->distrito_naci->provincia->departamento_id,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Departamento'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Provincia de Nacimiento:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('provincia',$provincias,$user->distrito_naci->provincia->id,['required','id'=>'provincia_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Provincia'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Distrito de Nacimiento:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('distrito_nac',$distritos,$user->distrito_nac,['required','id'=>'distrito_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Distrito'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nacionalidad:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('nacionalidad', $user->nacionalidad, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tipo Sangre:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('tipo_sangre', $user->tipo_sangre, ['class'=>'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">E-mail:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::email('email', $user->email, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Domicilio Actual:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('domicilio', $user->domicilio, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Nombre de la calle, Av. Jr, etc'])!!}
											</div>
											<div class="clearfix">
												{!!Form::text('n_domicilio', $user->n_domicilio, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Número, Lt., Mz., etc','style'=>'margin-top: 2px;'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Telefono:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('telefono', $user->telefono, ['class'=>'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" >Fecha de Ingreso-UNHEVAL:</label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::date('f_unheval',$user->f_unheval,['class'=>'col-12'])!!} 
												</div>
											</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Facultad:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('facultad', $user->estudiante->escuela->facultad->facultad,['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...','disabled'=>'true'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Escuela Profesional:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('facultad', $user->estudiante->escuela->escuela,['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...','disabled'=>'true'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Año de Estudio:</label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::text('anio_estudio', $user->estudiante->anio_estudio,['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...'])!!}
												</div>
											</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Religión:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('religion_id',$religiones,$user->religion_id,['required','id'=>'e_departamento', 'class'=>'col-xs-12 col-sm-6'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Estado Civil:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('est_civil_id',$est_civils,$user->est_civil_id,['required', 'class'=>'col-xs-12 col-sm-6'])!!}
											</div>
										</div>
									</div>
									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Número de Hijos:</label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::text('n_hijos', $user->n_hijos,['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...'])!!}
												</div>
											</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Vive con:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix"><br>
												<label>
													<input name="vc_padre" class="ace" type="checkbox" value="1"
														@if($user->vc_padre=='1')
                											checked="checked"
              											@endif
													/>
													<span class="lbl"> Padre</span>
												</label><br>
												<label>
													<input name="vc_madre" value="1" class="ace" type="checkbox" 
														@if($user->vc_madre=='1')
                											checked="checked"
              											@endif />
													<span class="lbl"> Madre</span>
												</label><br>
												<label>
													<input name="vc_hermano" value="1" type="checkbox" class="ace"
														@if($user->vc_hermano=='1')
                											checked="checked"
              											@endif />
													<span class="lbl"> Hermano</span>
												</label><br>
												<label>
													<input name="vc_conyugue" value="1" type="checkbox" class="ace"
														@if($user->vc_conyugue=='1')
                											checked="checked"
              											@endif />
													<span class="lbl"> Conyugue</span>
												</label><br>
												<label>
													<input name="vc_pension" value="1" type="checkbox" class="ace"
														@if($user->vc_pension=='1')
                											checked="checked"
              											@endif/>
													<span class="lbl"> Pensión</span>
												</label><br>
												<label>
													<input name="vc_otros" value="1" type="checkbox" class="ace"
														@if($user->vc_otros=='1')
                											checked="checked"
              											@endif/>
													<span class="lbl"> Otros</span>
												</label><br>
												
											</div>
										</div>
									</div>

									<div class="hr hr-dotted"></div>
									<h3 class="lighter block green">1.1 Colegio de Procedencia
									</h3>
									<div class="col-12">
									<div class="col-sm-6 col-xs-12" align="left">
										<h4>4to. Secundaria</h4>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Colegio </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::text('iv_colegio', $user->estudiante->colegio->iv_colegio,['class'=> 'form-control', 'placeholder'=>'Nombre del colegio'])!!}
												</div>
											</div>
										</div>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Tipo </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::select('iv_tipo',$tipoColegios,$user->estudiante->colegio->iv_tipo,['required'])!!}
												</div>
											</div>
										</div>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Departamento </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::select('iv_dep_colegio',$departamentos,$user->estudiante->colegio->iv_distrit->provincia->departamento_id,['required','placeholder' => 'Departamento','class'=>'form-control','id'=> 'iv_dep'])!!}
												</div>
											</div>
										</div>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Provincia </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::select('iv_prov_colegio',$provincias,$user->estudiante->colegio->iv_distrit->provincia_id,['required','placeholder' => 'Provincia','class'=>'form-control','id'=>'iv_prov'])!!}
												</div>
											</div>
										</div>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Distrito </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::select('iv_distrito',$distritos,$user->estudiante->colegio->iv_distrito,['required','id'=>'e_departamento', 'placeholder' => 'Distrito', 'class'=>'form-control','id'=>'iv_dist'])!!}
												</div>
											</div>
										</div>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Año </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::text('iv_fecha', $user->estudiante->colegio->iv_fecha, ['placeholder'=>'Escribir aquí...'])!!}
												</div>
											</div>
										</div>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Pensión S/ </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::text('iv_pension', $user->estudiante->colegio->iv_pension,['placeholder'=>'Escribir aquí...'])!!}
												</div>
											</div>
										</div>
									</div>			
									<div class="col-sm-6 col-xs-12">
										<h4>5to. Secundaria</h4>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Colegio </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::text('v_colegio', $user->estudiante->colegio->v_colegio,['class'=> 'form-control', 'placeholder'=>'Nombre del colegio'])!!}
												</div>
											</div>
										</div>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Tipo </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::select('v_tipo',$tipoColegios,$user->estudiante->colegio->v_tipo,['required'])!!}
												</div>
											</div>
										</div>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Departamento </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::select('v_dep_colegio',$departamentos,$user->estudiante->colegio->v_distrit->provincia->departamento_id,['required','placeholder' => 'Departamento','class'=>'form-control','id'=>'v_dep'])!!}
												</div>
											</div>
										</div>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Provincia </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::select('v_prov_colegio',$provincias,$user->estudiante->colegio->v_distrit->provincia_id,['required', 'placeholder' => 'Provincia','class'=>'form-control','id'=>'v_prov'])!!}
												</div>
											</div>
										</div>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Distrito </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::select('v_distrito',$distritos,$user->estudiante->colegio->v_distrito,['required','id'=>'e_departamento', 'placeholder' => 'Distrito', 'class'=>'form-control','id'=>'v_dist'])!!}
												</div>
											</div>
										</div>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Año </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::text('v_fecha', $user->estudiante->colegio->v_fecha, ['placeholder'=>'Escribir aquí...'])!!}
												</div>
											</div>
										</div>
										<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3"> Pensión S/ </label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::text('v_pension', $user->estudiante->colegio->v_pension,['placeholder'=>'Escribir aquí...'])!!}
												</div>
											</div>
										</div>
									</div>
									</div>

																
									<h3 class="lighter block green">1.2 Modalidad por la que logro el ingreso
									</h3>
									<div class="form-group">
										
										<div class="col-xs-12 col-sm-9">
										{!!Form::text('mi', $user->estudiante->m_ingreso->modalidad,['class'=> 'col-xs-12 col-sm-6','disabled'=>'true' ,'placeholder'=>'Escribir aquí...'])!!}
										</div><br>

									</div>
									<div class="hr hr-dotted"></div>
									<div align="center" ><br>
                          			<input type="hidden" name="id" value="{{$user->id}}">
                          			<input type="submit" value="Actualizar" class="btn btn-info" onclick="lafuncion('/fichasocial/general','#elformulario1-1','#step-11')"><br><br></div>

									<div class="space-2"></div>
								{!! Form::close() !!}