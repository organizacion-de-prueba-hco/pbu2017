<html>
  <head>
    <title>Receta Médica </title>
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
          <h3 style="font-size: 16px; margin-bottom:0;">UNIVERSIDAD NACIONAL "HERMILIO VALDIZÁN" HUÁNUCO</h3>
          <p style="margin-bottom:0;"><b>DIRECCIÓN DE BIENESTAR UNIVERSITARIO</b></p>
          <p style="margin-bottom:0;"><b>OFICINA DE BIENESTAR UNIVERSITARIO</b></p><br>
          <p style="font-size: 15px;margin-bottom:0;"><b>UNIDAD DE SERVICIOS UNIVERSITARIOS - CENTRO MÉDICO</b></p>
        </td>
      <td align="right"><img src="imagenes/unheval-logo.png" height="70px;" class="h-img"></td>
      </tr>
    </table>
      <hr width="80%">
  </div>
  <div id="footer">
    <p class="page" style="border-top: 1px solid;" align="center">
      Av. Universitaria N° 600 - Cayhuayna Telf. 064-512341 Anexo 214
    </p>
  </div>
  <div id="content" style="margin-left: 30px; margin-right: 30px;">
    <br><br>
    <h2 align="center" style="font-size: 20px; font-family: fantasy;">CONSULTORIO ODONTOLÓGICO<br><br><u>Receta </u></h2>

    <div>
      <p><b>Apellidos y Nombres: </b>{{$medicina->user->apellido_paterno.' '.$medicina->user->apellido_materno.' '.$medicina->user->nombres}}</p>
      <p><b>Código Universitario: </b>{{$medicina->user->estudiante->cod_univ}}</p>
      <p><b>Escuela Profesional: </b>{{$medicina->user->estudiante->escuela->escuela}}</p><br>
      @if($medicina->tto_descripcion!='')
      <p><b><u>Indicaciones: </u></b></p>
      <p>{{$medicina->tto_descripcion}}</p><br>
      @endif

      <p><b><u>Medicamentos: </u></b></p>
      <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" width="100%">
      <thead>
        <tr>
          <th class="tth">Cantidad</th>
          <th class="tth">Nombre</th>
          <th class="tth">Presentación</th>
          <th class="tth">Indicacaiones</th>
        </tr>
      </thead>
      <tbody>
      
      @foreach($recetas as $r)
        <tr style="border: 1px solid black;">
          <td class="ttd" align="center">{{$r->cantidad}}</td>
          <td class="ttd">{{$r->medicamento->medicamento}}</td>
          <td class="ttd">{{$r->medicamento->presentacion}}</td>
          <td class="ttd">{{$r->indicaciones}}</td>
        </tr>
      @endforeach()
      <?php $r=App\CmOdoMed::where('odontologia_id',$r->odontologia_id)->first(); ?>
      </tbody>
    </table>
    </div><br><br>
    <div align="right">
      <p>
        <p><i>Huánuco {{$r->created_at->format('d')}} de 
        <?php 
        switch($r->created_at->format('F')) {
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
      {{$month}} {{$r->created_at->format('Y')}}</i>
    </p><br><br><br><br><br><br><br><br>
      </p>
      <p>_____________________<br>Firma y Sello&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    </div>
    <br>

  </div>
  </body>
</html>