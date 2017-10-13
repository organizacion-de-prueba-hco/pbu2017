<html>
<?php
  $fn= Carbon\Carbon::parse($exon->estudiant->user->f_nac);
  $edad=Carbon\Carbon::createFromDate($fn->format('Y'),
        $fn->format('m'),
        $fn->format('d')
      )->age;
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
          <h3 style="font-size: 15px; margin-bottom:0;">UNIVERSIDAD NACIONAL "HERMILIO VALDIZÁN" - HUÁNUCO</h3>
          <p style="margin-bottom:0; font-size: 22px;"><b>DIRECCIÓN DE BIENESTAR UNIVERSITARIO</b></p>
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
  
    <h2 align="center" style="font-size: 23px; font-family: fantasy;"><u>EXONERACIÓN DE PAGO PARA ATENCIÓN EN EL CENTRO MÉDICO UNHEVAL</u></h2>
  <br>
 
    <div>
      <div align="right"><span  style="background-color: yellow;">EPCM-{{$exon->id}}</span></div>
      <p><b>NOMBRES Y APELLIDOS: </b>{{$exon->estudiant->user->nombres}} {{$exon->estudiant->user->apellido_paterno}} {{$exon->estudiant->user->apellido_materno}}</p>
      <p><b>EDAD: </b>{{$edad}}</p>
      <p><b>E.P: </b>{{$exon->estudiant->escuela->escuela}} <b>TELÉFONO: </b>{{$exon->estudiant->user->telefono}}</p>
      <p><b>DOMICILIO : </b>{{$exon->estudiant->user->domicilio.' '.$exon->estudiant->user->n_domicilio}}</p>
      <p><b>AÑO DE ESTUDIOS : </b>{{$exon->estudiant->anio_estudio}}</p>
      <br>
      <p><b>OPINIÓN DE TRABAJADORA SOCIAL:</b></p>
      <P>{{$exon->opinion}}</P>

     <br><br><br><br>
      <p><i>Huánuco {{$exon->created_at->format('d')}} de 
        <?php 
        switch($exon->created_at->format('F')) {
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
      {{$month}} {{$exon->created_at->format('Y')}}</i>
    </p>
      <br><br><br><br><br>
        <div align="right">
          <p>.......................................</p>
          <p>ASISTENTE SOCIAL</p>
        </div>
      </div>
    </div>
    <br>

  </div>
  </body>
</html>