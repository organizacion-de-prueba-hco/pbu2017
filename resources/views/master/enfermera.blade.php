<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Enfermeria :: @yield('titulo')</title>
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
		{!!Html::style('https://fonts.googleapis.com/css?family=Kaushan+Script')!!}
		
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		{!!Html::script('assets/js/ace-extra.min.js')!!}
		
		@yield('estilos')
		@yield('activacion')
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<img src="{{URL::to('imagenes/unheval-logo.png')}}" width="22px">
							Bienestar Universitario
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
												
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="{{URL::to('imagenes/avatar/'.Auth::user()->foto)}}"
								alt="Foto" />
								<span class="user-info">
									<small>{{Auth::user()->nombres}}</small>
									{{Auth::user()->apellido_paterno.' '.Auth::user()->apellido_materno}}
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="{{url('enfermera')}}">
										<i class="ace-icon fa fa-cog"></i>
										Ajustes
									</a>
								</li>
								<li>
									<a href="{{url('manual/enfermera.pdf')}}" target="_black">
										<i class="ace-icon fa fa-exclamation"></i>
										Ayuda
									</a>
								</li>
								<li class="divider"></li>

								<li>
									<a href="{{url('log')}}">
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<b>Enfermería</b>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="{{$i}}">
						<a href="{{url('enf')}}">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> Inicio </span>
						</a>
						<b class="arrow"></b>
					</li>
					<!-- <li class="active open"> -->
					<li class="{{$ii}}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user-md"></i>
							<span class="menu-text"> Medicina </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="{{$ii_i}}">
								<a href="{{url('enfmed')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Atención
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{$ii_ii}}">
								<a href="{{url('enfmeds/tablatbc')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Descarte TBC
								</a>
								<b class="arrow"></b>
							</li>

							<li class="{{$ii_iii}}">
								<a href="{{url('enfmeds/tablabs')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Constancia Buena Salud
								</a>

								<b class="arrow"></b>
							</li>

							<li class="{{$ii_iv}}">
								<a href="{{url('enfmeds/tablaenf')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Constancia por enfermedad
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="{{$iii}}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-heartbeat "></i>
							<span class="menu-text"> Odontología </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{$iii_i}}">
								<a href="{{url('enfodonto')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Atención
								</a>

								<b class="arrow"></b>
							</li>

							<li class="{{$iii_ii}}">
								<a href="{{url('directivotalleres/uafsm')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Reportes
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="{{$iv}}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-medkit"></i>
							<span class="menu-text"> Farmacia </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{$iv_i}}">
								<a href="{{url('enffarms/index','1')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Atención Medicina
								</a>

								<b class="arrow"></b>
							</li>
							<li class="{{$iv_iii}}">
								<a href="{{url('enffarms/index','2')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Atención Odontología
								</a>

								<b class="arrow"></b>
							</li>

							<li class="{{$iv_ii}}">
								<a href="{{url('enfinv')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Inventario
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="{{$v}}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-plus-square"></i>
							<span class="menu-text"> Otros </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="{{$v_i}}">
								<a href="{{url('enfotroinv')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Inventario
								</a>

								<b class="arrow"></b>
							</li>

							<li class="{{$v_ii}}">
								<a href="{{url('enfotroproc')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Procedimientos
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>		
					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<!-- Rutas -->
						@yield('ruta')
						
					</div>

					<div class="page-content">
						<div class="row">
							@include('master.mensajes')
							@yield('contenido')
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
