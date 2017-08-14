<html>
<?php
function edades($f_nac){
  $fn= Carbon\Carbon::parse($f_nac);
  $edad=Carbon\Carbon::createFromDate($fn->format('Y'),
        $fn->format('m'),
        $fn->format('d')
      )->age;
  return $edad;
}
?>
  <head>
    <title>Exoneración de Pago</title>
    <meta http-equiv="Content-Type" content="text/html;">
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <style>
      @page { margin: 120px 40px 85px 40px;/*ejes: arriba, derecha, abajo, izquierda*/}
      #header { position: fixed; left: 0px; top: -115px; right: 0px; height: 115px; /*background-color: blue;*/ }
      #footer { position: fixed; left: 0px; bottom: -90px; right: 0px; height: 50px; /*background-color: lightblue;*/ font-style: italic;}
      #footer .page:after { content: counter(page, upper-arabic); /*cambiar arabic por roman si se quiere numeros romanos*/ }

      /*Tablas*/
      .tth{font-size:16px;font-weight:normal;background:#e8edff; padding:8px;}
      .ttd{font-size:14px;padding: 8px;}
      .h-img{
        margin-top: 20px;
      }
      p{
        margin:5px;
        margin-left: 15px;
      }


    </style>
</head>
<body>
  <div id="header">
    <table width="100%">
      <tr align="left">
        <td><img src="imagenes/unheval-logo.png" height="70px" class="h-img"></td>
        <td align="center">
          <h3 style="font-size: 18px; margin-bottom:0;">UNIVERSIDAD NACIONAL "HERMILIO VALDIZÁN"</h3>
          <p style="margin-bottom:0;"><b>BIENESTAR UNIVERSITARIO</b></p>
          <p style="margin-bottom:0;"><b>SERVICIO SOCIAL</b></p>
        </td>
      <td align="right"><img src="imagenes/unheval-logo.png" height="60px;" class="h-img"></td>
      </tr>
    </table>
      <hr width="80%">
  </div>
  <div id="footer">
    <p class="page" style="border-top: 1px solid;" align="right">{{$date}}
    @for($i=0;$i<8;$i++)
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    @endfor
    Página</p>
  </div>
  <div id="content" style="margin-left: 30px; margin-right: 30px;">
  
    <h2 align="center" style="font-size: 23px; font-family: fantasy;"><u>VISITA HOSPITALARIA</u></h2>
  <br>
 
    <div>
      <p><b>E.P.: </b>{{$vd->cuadrofamiliar->user->estudiante->escuela->escuela}}</p>
      @if($vd->cuadrofamiliar->parentesco=='YO')
      <p><b>ALUMNO: </b>{{$vd->cuadrofamiliar->user->nombres}} {{$vd->cuadrofamiliar->user->apellido_paterno}} {{$vd->cuadrofamiliar->user->apellido_materno}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>EDAD: </b>{{edades($vd->cuadrofamiliar->user->f_nac)}}</p>
      <p><b>DOMICILIO: </b>{{$vd->cuadrofamiliar->user->domicilio.' '.$vd->cuadrofamiliar->user->n_domicilio}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

      @else
      <p><b>ALUMNO: </b>{{$vd->cuadrofamiliar->user->nombres}} {{$vd->cuadrofamiliar->user->apellido_paterno}} {{$vd->cuadrofamiliar->user->apellido_materno}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b></p>
      <p><b>NOMBRE DEL FAMILIAR: </b>{{$vd->cuadrofamiliar->nombres}} ({{$vd->cuadrofamiliar->parentesco}}) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>EDAD: </b>{{edades($vd->cuadrofamiliar->f_nac)}}</p>
      <p><b>DOMICILIO: </b>{{$vd->cuadrofamiliar->residencia}}</p> 
      @endif
      <p><b>CENTRO DE ATENCIÓN: </b> {{$vd->centro_atencion}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>TIPO DE SANGRE: </b>{{$vd->tipo_sangre}}</p><br>

      <p><b>DIAGNÓSTICO: </b></p>
      <p>{{$vd->diagnostico}}</p><br>
      <p><b>INTERVENCIÓN SOCIAL: </b></p>
      <p>{{$vd->intervencion}}</p><br>
      <p><b>OBSERVACIONES: </b></p>
      <p>{{$vd->observaciones}}</p><br>

     <br><br><br><br>
      <p><i>Huánuco {{$vd->created_at->format('d')}} de 
        <?php 
        switch($vd->created_at->format('F')) {
          case "January":  $month = "Enero"; break;
          case "February":   $month = "Febrero"; break;
          case "March":    $month = "Marzo"; break;
          case "April":    $month = "Abril"; break;
          case "May":    $month = "Mayo"; break;
          case "June":     $month = "Junio"; break;
          case "July":     $month = "Julio"; break;
          case "August":   $month = "Agosto"; break;
          case "September":  $month = "Setiembre"; break;
          case "October":  $month = "Octubre"; break;
          case "November":   $month = "Noviembre"; break;
          case "December":   $month = "Diciembre"; break;
        }
     ?>
      {{$month}} {{$vd->created_at->format('Y')}}</i>
    </p>
      <br><br><br><br><br>
        <table width="100%">
      <tr align="center">
        <td>......................................................<br>
            PERSONA ENTREVISTADA<br>
        </td>
        <td>......................................................<br>
            TRABAJADOR SOCIAL<br>
        </td>
      </tr>
    </table>
      </div>
    </div>
    <br>

  </div>
  </body>
</html>