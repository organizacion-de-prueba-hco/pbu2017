<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Bienestar Universitario - UNHEVAL</title>
        <link rel="icon" type="image/png" href="{{url('imagenes/unheval-logo.png')}}" />
        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <!-- bootstrap & fontawesome -->
        {!!Html::style('assets/css/bootstrap.min.css')!!}

        {!!Html::style('assets/font-awesome/4.5.0/css/font-awesome.min.css')!!}

        <!-- text fonts -->
        {!!Html::style('assets/css/fonts.googleapis.com.css')!!}

        <!-- ace styles -->
        {!!Html::style('assets/css/ace.min.css')!!}

        <!--[if lte IE 9]>
            {!!Html::style('assets/css/ace-part2.min.css')!!}
        <![endif]-->
        {!!Html::style('assets/css/ace-rtl.min.css')!!}

        <!--[if lte IE 9]>
          {!!Html::style('assets/css/ace-ie.min.css')!!}
        <![endif]-->

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
@include('master.mensajes')
    <body class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="space-6"></div>
                    <div class="col-12" align="center">
                        <span style="font-size:30px;
                        font-weight:bold; 
                        -webkit-text-fill-color: blue;
                        -webkit-text-stroke: 0.01px white;"> 
                        <img src="{{url('imagenes/unheval-logo.png')}}" width="30px;"> UNIVERSIDAD NACIONAL HERMILIO VALDIZÁN 
                        <img src="{{url('imagenes/unheval-logo.png')}}" width="30px;"></span><br>
                        <span class="white" id="id-text2" style="font-size: 30px;">Bienestar Universitario</span><br><span class="white"; style="font-size: 19px;"><u>Cuestionario S.R.Q.</u></span>
                    </div>
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="ace-icon fa fa-coffee green"></i>
                                                Ingrese sus datos
                                            </h4>

                                            <div class="space-6"></div>
                                {!! Form::open(['url' => 'psicopedagogia/cuestionarioinicio', 'method' => 'POST']) !!}
                                    <fieldset>
                                        <label class="block clearfix">Código Universitario
                                            <span class="block input-icon input-icon-right">
                                            <input type="text" maxlength="10" id="myField" name="usuario" class="form-control" placeholder="Código Universitario" required="true" onkeypress='return valida(event)'/>
                                                <i class="ace-icon fa fa-user"></i>
                                            </span>
                                        </label>

                                        <label class="block clearfix">Fecha de Nacimiento
                                            <span class="block input-icon input-icon-right">
                                                <input type="date" name="f_nac" class="form-control" required="true" />
                                                <i class="ace-icon fa fa-calendar"></i>

                                            </span>
                                        </label>

                                        <div class="space"></div>

                                        <div class="clearfix">
                                            <button type="submit" class=" pull-right btn btn-sm btn-primary">
                                            <i class="ace-icon fa fa-hand-o-right"></i>
                                            Ir al cuestionario
                                            </button>
                                        </div>
                                        <div class="space-4"></div>
                                    </fieldset>
                                {!! Form::close() !!}
                                        </div><!-- /.widget-main -->
                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->

                                
                            </div><!-- /.position-relative -->

                            
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->
        {!!Html::script('assets/js/jquery-2.1.4.min.js')!!}
        {!!Html::script('assets/js/bootstrap.min.js')!!}

        <script type="text/javascript">
           function valida(e){
                  tecla = (document.all) ? e.keyCode : e.which;

                  //Tecla de retroceso para borrar, siempre la permite
                  if ((tecla==8)){
                      return true;
                  }
                      
                  // Patron de entrada, en este caso solo acepta numeros
                  patron =/[0-9]/;
                  tecla_final = String.fromCharCode(tecla);
                  return patron.test(tecla_final);
              }
        </script>
    </body>
</html>
