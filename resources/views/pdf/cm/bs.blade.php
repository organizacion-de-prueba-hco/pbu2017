<html>
<?php use Carbon\Carbon; Carbon::setLocale('es');  
$fn= Carbon::parse($r_bs->medicina->user->f_nac);
?>
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
    <h2 align="center" style="font-size: 20px; font-family: fantasy;">CONSTANCIA DE BUENA SALUD</h2>

    <div>
      <p>{{$r_bs->medicina->user->apellido_paterno.' '.$r_bs->medicina->user->apellido_materno.' '.$r_bs->medicina->user->nombres}} de {{Carbon::createFromDate( $fn->format('Y'),$fn->format('m'), $fn->format('d'))->age}} años de edad, identificado con el DNI N° {{$r_bs->medicina->user->dni}}; ha sido evaluado(a) en el Centro Médico de la UNHEVAL; encontrandose con el diagnóstico: </p>
      <p>{{$r_bs->medicina->imp_dx}}</p>  <br>
      <p>Se emite el presente para los fines que requiera.</p>


    </div><br><br><br><br><br><br><br><br>
    <div align="right">
      <p>_____________________<br>Firma y Sello&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    </div>
    <br>

  </div>
  </body>
</html>