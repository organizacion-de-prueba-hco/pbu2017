<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Servicio Univ :: @yield('titulo')</title>
		<link rel="icon" type="image/png" href="{{url('imagenes/unheval-logo.png')}}" />

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		{!!Html::style('assets/css/bootstrap.min.css')!!}
		{!!Html::style('assets/font-awesome/4.5.0/css/font-awesome.min.css')!!}
		<!-- page specific plugin styles -->

		<!-- text fonts -->
		{!!Html::style('assets/css/fonts.googleapis.com.css')!!}

		<!-- ace styles -->
		{!!Html::style('assets/css/ace.min.css')!!}
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		{!!Html::style('assets/css/ace-skins.min.css')!!}
		{!!Html::style('assets/css/ace-rtl.min.css')!!}

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		{!!Html::script('assets/js/ace-extra.min.js')!!}
		@yield('activacion')
		@yield('estilos')

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
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
							<h4>ENCUESTA DE SATISFACIÓN DEL USUARIO DEL COMEDOR UNIVERSITARIO "{{$encuesta->encuesta}}"</h4>
						</div>
						<div class="hr hr-dotted"></div>
						<div class="row">
							
							<!--Contenido-->
							  {!! Form::open(['route' => 'encuesta.update', 'method' => 'PUT','class'=>'form-horizontal form-label-left']) !!}
							  	<div class="col-sm-offset-3"><br>
									<h5><b>1.- <u>PERSONAL</u></b></h5>
									<label><i>Evalúe al personal del comedor, elija una opción en cada criterio: </i></label><br>
								</div>
                  					<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Amabilidad:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('i_a',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Trato personal:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('i_b',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div> 
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Eficacia:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('i_c',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div> 
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Confianza:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('i_d',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div> 
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Rapidez del servicio:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('i_e',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div> 
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Higiene:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('i_f',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div> 
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Vestimenta Personal:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('i_g',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>

								<div class="col-sm-offset-3"><br>
									<h5><b>2.- <u>ALIMENTO</u></b></h5>
									<label><i>Evalúe el alimento que le sirven en el comedor, elija una opción en cada criterio: </i></label><br>
								</div>
                  			<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Ración de los Alimentos:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('ii_a',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Calidad del Desayuno:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('ii_b',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Calidad del Plato de Entrada:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('ii_c',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Calidad del plato de Fondo:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('ii_d',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Calidad de la fruta:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('ii_e',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Calidad de la bebida:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('ii_f',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Variedad de Alimentos:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('ii_g',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Sabor de la Comida:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('ii_h',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Variedad de la bebida:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('ii_i',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
								<div class="col-sm-offset-3"><br>
									<h5><b>3.- <u>SERVICIOS</u></b></h5>
									<label><i>Evalúe los Servicios que le brindan en el comedor, elija una opción en cada criterio: </i></label><br>
								</div>
                  			<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Conford del Comedor:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('iii_a',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Limpieza del comedor:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('iii_b',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Espera en la cola:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('iii_c',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Disponibilidad de sillas y mesas:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('iii_d',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Cumplimiento con el horario:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('iii_e',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
								<div class="col-sm-offset-3"><br>
									<h5><b>4.- <u>INSTALACIONES</u></b></h5>
									<label><i>Evalúe los instalaciones que le brindan en el comedor, elija una opción en cada criterio: </i></label><br>
								</div>
                  			<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Conford del Comedor:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('iv_a',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Limpieza:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('iv_b',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Iluminación:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('iv_c',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Temperatura:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('iv_d',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Ruidos:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('iv_e',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-5 no-padding-right">Ventilación, humo y olores:</label>
										<div class="col-xs-12 col-sm-4">
											<div class="clearfix">
												{!!Form::select('iv_f',$respuestas,null,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Elija una opción'])!!}
											</div>
										</div>
									</div>
                  <div class="hr hr-dotted"></div>
                  <div align="center" ><br>
                                <input type="hidden" name="encuesta_id" value="{{$encuesta->id}}">
                                <input type="hidden" name="estudiante_id" value="{{$estudiante->user_id}}">
                                <input type="submit" value="Enviar" class="btn btn-info"><br><br></div>

                  <div class="space-2"></div>
						{!! Form::close() !!}
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
		@yield('script')
		<!--FIN de Otros Scripts-->
	</body>
</html>
