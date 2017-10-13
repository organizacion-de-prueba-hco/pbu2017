<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Psicopedagogía :: Cuestionario S.R.Q.</title>
		<link rel="icon" type="image/png" href="{{url('imagenes/unheval-logo.png')}}" />

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		{!!Html::style('assets/css/bootstrap.min.css')!!}
		{!!Html::style('assets/font-awesome/4.5.0/css/font-awesome.min.css')!!}
		{!!Html::style('assets/css/fonts.googleapis.com.css')!!}
		{!!Html::style('assets/css/ace.min.css')!!}
		{!!Html::style('assets/css/ace-skins.min.css')!!}
		{!!Html::style('assets/css/ace-rtl.min.css')!!}
		{!!Html::script('assets/js/ace-extra.min.js')!!}
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<img src="{{URL::to('imagenes/unheval-logo.png')}}" width="22px">
							{{$estudiante->user->nombres}}, {{$estudiante->user->apellido_paterno.' '.$estudiante->user->apellido_materno}} (Cód. {{$estudiante->cod_univ}})
						</small>
					</a>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			

			<div class="main-content">
				<div class="main-content-inner">
					
					<div class="page-content">
						<div align="center">
							<h3>DIRECCION DE BIENESTAR UNIVERSITARIO</h3>
							<h4>CUESTIONARIO DE SINTOMAS S.R.Q.</h4>
						</div>
						<div class="hr hr-dotted"></div>
						<div class="row">
							
							<!--Contenido-->
<div class="row">
	@if($estudiante)
<div class="hr dotted"></div>

<?php
    $estadoBoton = '';
    $mensajeCabecera='';

?>

<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<h3 style="color: red; margin-left: 10em; padding-bottom: 5px;">{{$mensajeCabecera}}</h3>
								{!! Form::open(['url' => 'psicopedagogia/cuestionarioregistrarnuevo', 'method' => 'POST', 'class'=>'form-horizontal']) !!}
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> DNI </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Código Universitario" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->user->dni}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Código Universitario </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Código Universitario" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->cod_univ}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nombres </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->user->nombres}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Apellidos </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->user->apellido_paterno.' '.$estudiante->user->apellido_materno}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Sexo </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" @if($estudiante->user->genero=='1') value="MASCULINO" @else value="FEMENINO" @endif >
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Facultad </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->escuela->facultad->facultad}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Escuela </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->escuela->escuela}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Modalidad de Ingreso </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Código Universitario" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->m_ingreso->modalidad}}">
										</div>
									</div>

									
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Domicilio Actual:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('domicilio', $estudiante->user->domicilio, ['class'=> 'col-xs-10 col-sm-5', 'placeholder'=>'Nombre de la calle, Av. Jr, etc'])!!}
											</div>
											<div class="clearfix">
												{!!Form::text('n_domicilio', $estudiante->user->n_domicilio, ['required','class'=> 'col-xs-10 col-sm-5', 'placeholder'=>'Número, Lt., Mz., etc','style'=>'margin-top: 2px;'])!!}
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Telf./Cel. </label>
										<div class="col-sm-9">
											<input name="telefono" type="text" placeholder="N° Telf./Cel" class="col-xs-10 col-sm-5" value="{{$estudiante->user->telefono}}">
										</div>
									</div>

									<hr>
									<h3 align="center">CUESTIONARIO DE SÍNTOMAS S.R.Q.</h3>
									<br>
									<div class="form-group">
							
										<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8  col-xs-12">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>N°</th>
													<th class="center">PREGUNTAS</th>
													<th class="center">RESPUESTAS<br>YES ( si ) - NO</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>01</td>
													<td>¿Tiene frecuentes dolores de cabeza?</td>
													<td class="center"><label>
														<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_i">
														<span class="lbl middle"></span>
														</label>
													</td>
												</tr>
												<tr>
													<td>02</td>
													<td>¿Tiene mal apetito?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_ii">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>03</td>
													<td>¿Duerme mal?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_iii">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>04</td>
													<td>¿Se asusta con facilidad?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_iv">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>05</td>
													<td>¿Sufre de temblor de manos?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_v">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>06</td>
													<td>¿Se siente nervioso o tenso?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_vi">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>07</td>
													<td>¿Sufre de mala digestión?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_vii">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>08</td>
													<td>¿Tiene dificultades para  pensar con claridad?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_viii">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>09</td>
													<td>¿Se siente triste?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_ix">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>10</td>
													<td>¿Llora usted con mucha frecuencia?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_x">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>11</td>
													<td>¿Tiene dificultad en disfrutar sus actividades diarias?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xi">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>12</td>
													<td>¿Tiene dificultad para tomar decisiones?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xii">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>13</td>
													<td>¿Tiene dificultad en hacer su trabajo y/o Estudios? <br>(¿sufre usted con su trabajo y/o estudios?)</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xiii">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>14</td>
													<td>¿Es incapaz de desempeñar un papel útil en su vida?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xiv">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>15</td>
													<td>¿Ha perdido interés en las cosas que usualmente hacía?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xv">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>16</td>
													<td>¿Siente que usted es una persona inútil?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xvi">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>17</td>
													<td>¿Ha tenido la idea de acabar con su vida?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xvii">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>18</td>
													<td>¿Se siente cansado todo el tiempo?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xviii">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>19</td>
													<td>¿Tiene sensaciones desagradables en su estómago?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xix">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>20</td>
													<td>¿Se cansa con facilidad?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xx">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>21</td>
													<td>¿Siente usted que alguien ha tratado de herirlo en alguna forma? <br>Ejm: pensar que alguien conspira contra usted, que alguien intenta dañarle, etc.</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xxi">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>22</td>
													<td>¿Usted se considera una persona mucho más importante que los demás?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xxii">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>23</td>
													<td>¿Ha notado interferencias o algo raro en su pensamiento? <br>Ejm. Oír voces, ver cosas que otras personas no pueden ver ni oír, etc.</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xxiii">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>24</td>
													<td>¿Oye voces sin saber de dónde vienen o que otras personas no pueden oír?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xxiv">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>25</td>
													<td>¿Ha tenido convulsiones, ataques o caídas al suelo, con movimientos de brazos y piernas;<br> con mordedura de la lengua o pérdida del conocimiento?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xxv">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>26</td>
													<td>¿Alguna vez le ha parecido a su familia, sus amigos, su médico o a su sacerdote<br> que usted estaba bebiendo demasiado licor?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xxvi">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>27</td>
													<td>¿Alguna vez ha querido dejar de beber, pero no ha podido?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xxvii">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>28</td>
													<td>¿Ha tenido alguna vez dificultades en el trabajo (o estudio) a causa de la bebida,<br> como beber en el trabajo o en el colegio, o faltar a ellos?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xxviii">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>29</td>
													<td>¿Ha estado en riñas o lo han detenido estando borracho?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xxix">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>30</td>
													<td>¿Le ha parecido alguna vez que usted bebía demasiado?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1" name="p_xxx">
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
											</tbody>
										</table>
										</div>
									</div>

									<br>
									<div class="form-group" >
										<div class="col-sm-6">
											<input type='hidden' value="{{$estudiante->user_id}}" name="estudiante_id">
											<button type="submit" class="width-35 pull-right btn btn-sm btn-primary col-xs-10 col-sm-5" {{$estadoBoton}}>
											<i class="ace-icon fa fa-plus" ></i>
											<span class="bigger-110">Registrar </span>
											</button>
										</div>
									</div>
			                    {!! Form::close() !!}


								</div><!-- PAGE CONTENT ENDS -->

@else
	<h3>¡Error! <span> El Código ingresado no existe</span></h3><a href="{{url('psicosqr')}}">volver</a>
@endif

</div>

							<!--Fin de Contenido-->

						</div>
					</div>


				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Bienestar Universitario</span>
							- UNHEVAL &copy; 2017-2018
						</span>

						&nbsp; &nbsp;
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		{!!Html::script('assets/js/jquery-2.1.4.min.js')!!}

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		{!!Html::script('assets/js/bootstrap.min.js')!!}

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		{!!Html::script('assets/js/ace-elements.min.js')!!}
		{!!Html::script('assets/js/ace.min.js')!!}
		<!-- inline scripts related to this page -->
		<!--Otros Scripts-->
		<!-- page specific plugin scripts -->
		{!!Html::script('assets/js/jquery.dataTables.min.js')!!}
		{!!Html::script('assets/js/jquery.dataTables.bootstrap.min.js')!!}
		{!!Html::script('assets/js/dataTables.buttons.min.js')!!}
		{!!Html::script('assets/js/buttons.flash.min.js')!!}
		{!!Html::script('assets/js/buttons.html5.min.js')!!}
		{!!Html::script('assets/js/buttons.print.min.js')!!}
		{!!Html::script('assets/js/buttons.colVis.min.js')!!}
		{!!Html::script('assets/js/dataTables.select.min.js')!!}

		<script type="text/javascript">
		function valida(e){
          tecla = (document.all) ? e.keyCode : e.which;

          //Tecla de retroceso para borrar, siempre la permite
          if (tecla==8){
              return true;
          }

          // Patron de entrada, en este caso solo acepta numeros
          patron =/[0-9]/;
          tecla_final = String.fromCharCode(tecla);
          return patron.test(tecla_final);
    }
		</script>
		<!--FIN de Otros Scripts-->
	</body>
</html>
