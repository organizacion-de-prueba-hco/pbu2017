@extends('master.servicioSocial')
@section('activacion')
	<?php  
		$a='active'; $b='';$c=''; $c1='';$c2='';$c3='';$c4='';$d=''; $d1=''; $d2=''; $d3=''; $d4='';$e='';
		use Carbon\Carbon;
		Carbon::setLocale('es');
	?>
@endsection
@section('title','Ficha Socio Económica')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-list-alt"></i>	
	<li class="active">Ficha socio Económica</li>
	<li class="active">Ver más</li>	
</ul>
@endsection
@section('contenido')
@include('master.mensajes')
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<div class="hr hr-18 hr-double dotted"></div>
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<h4 class="widget-title lighter">Ficha Socio Económica</h4>

				<div class="widget-toolbar">
					<label>
						<a href="#"><small class="green">
							<i class="ace-icon fa fa-list-alt"></i>	
							<b>PDF</b></small>
						</a>
					</label>
				</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div id="fuelux-wizard-container">
						<div>
							<ul class="steps">
								<li data-step="1" class="active">
									<span class="step">I</span>
									<span class="title">DATOS GENERALES DEL ALUMNO </span>
								</li>
								<li data-step="2">
									<span class="step">II</span>
									<span class="title">CUADRO FAMILIAR </span>
								</li>
								<li data-step="3">
									<span class="step">III</span>
									<span class="title">SITUACIÓN ECONÓMICA FAMILIAR</span>
								</li>
								<li data-step="4">
									<span class="step">IV</span>
									<span class="title">DATOS DE VIVIENDA</span>
								</li>
								<li data-step="4">
									<span class="step">V</span>
									<span class="title">DATOS DE SALUD</span>
								</li>
								<li data-step="4">
									<span class="step">VI</span>
									<span class="title">OPINIÓN DE TRABAJADORA SOCIAL</span>
								</li>
							</ul>
						</div>
						<hr />

						<div class="step-content pos-rel">
							<div class="step-pane active" data-step="1">
								{!! Form::model($user,['route' => ['jusuexpediente.update', $user->id],'method' => 'PUT', 'class'=>'form-horizontal']) !!}

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
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Fecha de Nacimiento (edad):</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<label>
													{!!Form::date('f_nac',null,['class'=>'col-12'])!!} 
													<?php $fn= Carbon::parse($user->f_nac); ?>
													@if($user->f_nac<Carbon::now() && $user->f_nac!='0000-00-00' )
														 ({{Carbon::createFromDate(
															$fn->format('Y'),
															$fn->format('m'),
															$fn->format('d')
														)->age}} años)
													@endif
												</label>
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Departamento de Nacimiento:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('departamento',$departamentos,$user->distrito_naci->provincia->departamento_id,['required','id'=>'e_departamento', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Departamento'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Provincia de Nacimiento:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('provincia',$provincias,$user->distrito_naci->provincia->id,['required','id'=>'e_departamento', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Provincia'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Distrito de Nacimiento:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('distrito',$distritos,$user->distrito_nac,['required','id'=>'e_departamento', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Distrito'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nacionalidad:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('nacionalidad', null, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">E-mail:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::email('email', null, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Domicilio Actual:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('domicilio', null, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Nombre de la calle, Av. Jr, etc'])!!}
											</div>
											<div class="clearfix">
												{!!Form::text('n_domicilio', null, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Número, Lt., Mz., etc','style'=>'margin-top: 2px;'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" >Fecha de Ingreso-UNHEVAL:</label>
											<div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													{!!Form::date('f_unheval',null,['class'=>'col-12'])!!} 
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
												{!!Form::select('religion_id',$religiones,$user->religion_id,['required','id'=>'e_departamento', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Seleccione'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Estado Civil:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('est_civil_id',$est_civils,$user->est_civil_id,['required', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Seleccione'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Vive con:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix"><br>
												<label>
													<input name="subscription" value="2" type="checkbox" class="ace" />
													<span class="lbl"> Padre</span>
												</label><br>
												<label>
													<input name="subscription" value="2" type="checkbox" class="ace" />
													<span class="lbl"> Madre</span>
												</label><br>
												<label>
													<input name="subscription" value="2" type="checkbox" class="ace" />
													<span class="lbl"> Hermano</span>
												</label><br>
												<label>
													<input name="subscription" value="2" type="checkbox" class="ace" />
													<span class="lbl"> Conyugue</span>
												</label><br>
												<label>
													<input name="subscription" value="2" type="checkbox" class="ace" />
													<span class="lbl"> Pensión</span>
												</label><br>
												<label>
													<input name="subscription" value="2" type="checkbox" class="ace" />
													<span class="lbl"> Otros</span>
												</label><br>
												
											</div>
										</div>
									</div>

									<div class="hr hr-dotted"></div>
									<h3 class="lighter block green">1.1 Colegio de Procedencia
									</h3>
									<div class="form-group">
										<div class="col-xs-12 col-sm-12">
											<div class="clearfix">
												<table class="table table-bordered" style="background-color:	#F5FFFA">
												<thead>
													<tr>
														<th>Grado de Instrución</th>
														<th>Nombre del Colegio</th>
														<th>Tipo de Colegio</th>
														<th>Distrito / Departamento</th>
														<th>Año</th>
														<th>Pensión S/.</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>4to. Secundaria</td>
														<td>
															{!!Form::textArea('v_colegio', $user->estudiante->colegio->v_colegio,['cols'=>'auto','rows'=>'3', 'placeholder'=>'Escribir aquí...'])!!}
														</td>
														<td align="center">
															{!!Form::select('tipo',$tipoColegios,$user->estudiante->colegio->v_tipo,['required','placeholder' => 'Provincia'])!!}
														</td>
														<td align="center">
															{!!Form::select('departamento',$departamentos,$user->distrito_naci->provincia->departamento_id,['required','id'=>'e_departamento','placeholder' =>'Departamento']) !!}
															{!!Form::select('departamento',$departamentos,$user->distrito_naci->provincia->departamento_id,['required','id'=>'e_departamento', 'placeholder' => 'Departamento'])!!}<br>
															{!!Form::select('departamento',$departamentos,$user->distrito_naci->provincia->departamento_id,['required','id'=>'e_departamento', 'placeholder' => 'Departamento'])!!}
														</td>
														<td>
															{!!Form::text('v_fecha', $user->estudiante->colegio->v_fecha,['placeholder'=>'Escribir aquí...'])!!}
														</td>
														<td>
															{!!Form::text('v_pension', $user->estudiante->colegio->v_pension,['placeholder'=>'Escribir aquí...'])!!}
														</td>
													</tr>
													<tr>
														<td>5to. Secundaria</td>
														<td>
															{!!Form::textArea('iv_colegio', $user->estudiante->colegio->iv_colegio,['cols'=>'auto','rows'=>'3', 'placeholder'=>'Escribir aquí...'])!!}
														</td>
														<td align="center">
															{!!Form::select('tipo',$tipoColegios,$user->estudiante->colegio->iv_tipo,['required','placeholder' => 'Provincia'])!!}
														</td>
														<td align="center">
															<div>
															{!!Form::select('departamento',$departamentos,$user->distrito_naci->provincia->departamento_id,['required','id'=>'e_departamento','placeholder' => 'Departamento'])!!}
															{!!Form::select('departamento',$departamentos,$user->distrito_naci->provincia->departamento_id,['required','id'=>'e_departamento', 'placeholder' => 'Departamento'])!!}<br>
															{!!Form::select('departamento',$departamentos,$user->distrito_naci->provincia->departamento_id,['required','id'=>'e_departamento', 'placeholder' => 'Departamento'])!!}
															</div>
														</td>
														<td>
															{!!Form::text('iv_fecha', $user->estudiante->colegio->iv_fecha,['placeholder'=>'Escribir aquí...'])!!}
														</td>
														<td>
															{!!Form::text('iv_pension', $user->estudiante->colegio->iv_pension,['placeholder'=>'Escribir aquí...'])!!}
														</td>
													</tr>
													</tbody>
												</table>

											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="hr hr-dotted"></div>
									<h3 class="lighter block green">1.2 Modalidad por la que logro el ingreso
									</h3>
									<div class="form-group">
										
										<div class="col-xs-12 col-sm-9">
										{!!Form::text('mi', $user->estudiante->m_ingreso->modalidad,['class'=> 'col-xs-12 col-sm-6','disabled'=>'true' ,'placeholder'=>'Escribir aquí...'])!!}
										</div><br>
										

									</div>
									<div class="hr hr-dotted"></div>
									<div align="center" class="col-12">
											<button class="submit">Actualizar</button>
									</div>

									<div class="space-2"></div>
								{!! Form::close() !!}
							</div>

							<div class="step-pane" data-step="2">
								<div>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>
										<strong><i class="ace-icon fa fa-check"></i>Well done!
										</strong>
										You successfully read this important alert message.
										<br />
									</div>
									<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>
										<strong>
											<i class="ace-icon fa fa-times"></i>
																	Oh snap!
										</strong>

																Change a few things up and try submitting again.
										<br />
									</div>
									<div class="alert alert-warning">
										<button type="button" class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>
											<strong>Warning!</strong>
											Best check yo self, you're not looking too good.
											<br />
									</div>
										<div class="alert alert-info">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>
											<strong>Heads up!</strong>
																This alert needs your attention, but it's not super important.
											<br />
										</div>
								</div>
							</div>
							<div class="step-pane" data-step="3">
								<div class="center">
									<h3 class="blue lighter">This is step 3</h3>
								</div>
							</div>
							<div class="step-pane" data-step="4">
								<div class="center">
									<h3 class="green">Congrats!</h3>
															Your product is ready to ship! Click finish to continue!
								</div>
							</div>
						</div>
					</div>
					<hr />
					<div class="wizard-actions">
						<button class="btn btn-prev">
							<i class="ace-icon fa fa-arrow-left"></i>
							Anterior
						</button>
						<button class="btn btn-success btn-next" data-last="Finish">
							Siguiente
							<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
						</button>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('script')
		{!!Html::script('assets/js/wizard.min.js')!!}
		{!!Html::script('assets/js/jquery.validate.min.js')!!}
		{!!Html::script('assets/js/jquery-additional-methods.min.js')!!}
		{!!Html::script('assets/js/bootbox.js')!!}
		{!!Html::script('assets/js/jquery.maskedinput.min.js')!!}
		{!!Html::script('assets/js/select2.min.js')!!}


		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			
				$('[data-rel=tooltip]').tooltip();
			
				$('.select2').css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
			
			
				var $validation = false;
				$('#fuelux-wizard-container')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step "2" at first
					//buttons: '.wizard-actions:eq(0)'
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
					bootbox.dialog({
						message: "Thank you! Your information was successfully saved!", 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				}).on('stepclick.fu.wizard', function(e){
					//e.preventDefault();//this will prevent clicking and selecting steps
				});
			
			
				//jump to a step
				/**
				var wizard = $('#fuelux-wizard-container').data('fu.wizard')
				wizard.currentStep = 3;
				wizard.setState();
				*/
			
				//determine selected step
				//wizard.selectedItem().step
			
			
			
				//hide or show the other form which requires validation
				//this is for demo only, you usullay want just one form in your application
				$('#skip-validation').removeAttr('checked').on('click', function(){
					$validation = this.checked;
					if(this.checked) {
						$('#sample-form').hide();
						$('#validation-form').removeClass('hide');
					}
					else {
						$('#validation-form').addClass('hide');
						$('#sample-form').show();
					}
				})
			
			
			
				//documentation : http://docs.jquery.com/Plugins/Validation/validate
			
			
				$.mask.definitions['~']='[+-]';
				$('#phone').mask('(999) 999-9999');
			
				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");
			
				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						email: {
							required: true,
							email:true
						},
						password: {
							required: true,
							minlength: 5
						},
						password2: {
							required: true,
							minlength: 5,
							equalTo: "#password"
						},
						name: {
							required: true
						},
						phone: {
							required: true,
							phone: 'required'
						},
						url: {
							required: true,
							url: true
						},
						comment: {
							required: true
						},
						state: {
							required: true
						},
						platform: {
							required: true
						},
						subscription: {
							required: true
						},
						gender: {
							required: true,
						},
						agree: {
							required: true,
						}
					},
			
					messages: {
						email: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						password: {
							required: "Please specify a password.",
							minlength: "Please specify a secure password."
						},
						state: "Please choose state",
						subscription: "Please choose at least one option",
						gender: "Please choose gender",
						agree: "Please accept our policy"
					},
			
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},
			
					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});
			
				
				
				
				$('#modal-wizard-container').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
				
				
				/**
				$('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				
				$('#mychosen').chosen().on('change', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				*/
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});
			})
		</script>
@endsection