<html>
  <head>
    <title>Declaración Jurada</title>
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
  <br><br>
    <h2 align="center" style="font-size: 23px; font-family: fantasy;"><u>DECLARACIÓN JURADA</u></h2>
  <br>
  @if($dj->cuadrofamiliar->parentesco=='YO')
    <div>
      <p>Yo {{$dj->cuadrofamiliar->user->nombres.' '.$dj->cuadrofamiliar->user->apellido_paterno.' '.$dj->cuadrofamiliar->user->apellido_materno}} con DNI N° {{$dj->cuadrofamiliar->user->dni}}</p>
      <p>Domiciliado en {{$dj->cuadrofamiliar->residencia}}</p>
      <p>Distrito: {{$dj->distrit->distrito}}, Provincia: {{$dj->distrit->provincia->provincia}}, Departamento: {{$dj->distrit->provincia->departamento->departamento}}</p>
      <br>
      <p>En mi condición de Alumno(a) que Cursa estudios Universitarios en la UNHEVAL Escuela Profesional de {{$dj->cuadrofamiliar->user->estudiante->escuela->escuela}} en {{$dj->cuadrofamiliar->user->estudiante->anio_estudio}} año.</p><br>

      <p>DECLARO BAJO JURAMENTO: </p>
      <P>Tener un trabajo independiente en la cual desempeño como {{$dj->desempenio_como}}, percibiendo un haber mensual de S/ {{$dj->haber_mensual}} y teniendo una carga familiar de {{$dj->n_hijos}} hijos menores en edad escolar. Me solvento mensualmente con S/ {{$dj->apoyo_mensual}}. Para mis gastos de estudio, alimentación y alquiler de cuarto.</P>
      <p>Así mismo debo manifestarle que tengo otros gastos como {{$dj->otros_gastos}}.</p><br>
      <p>En caso de falsedad me someto a las sanciones correspondiete a Ley.</p>
      <div align="right"><br><br><br><br>
      <p><i>Huánuco {{$dj->created_at->format('d')}} de 
        <?php 
        switch($dj->created_at->format('F')) {
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
      {{$month}} {{$dj->created_at->format('Y')}}</i>
    </p>
      <br><br><br><br><br>
      <p>...........................................</p>
      <p>DNI N° {{$dj->cuadrofamiliar->dni}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      </div>
    </div>
  @else
    <div>
      <p>Yo {{$dj->cuadrofamiliar->nombres}} con DNI N° {{$dj->cuadrofamiliar->dni}} </p>
      <p>Domiciliado en {{$dj->cuadrofamiliar->residencia}}</p>
      <p>Distrito: {{$dj->distrit->distrito}}, Provincia: {{$dj->distrit->provincia->provincia}}, Departamento: {{$dj->distrit->provincia->departamento->departamento}}</p>
      <br>
      <p>En mi condición de {{$dj->cuadrofamiliar->parentesco}} del Alumno(a) {{$dj->cuadrofamiliar->user->nombres.' '.$dj->cuadrofamiliar->user->apellido_paterno.' '.$dj->cuadrofamiliar->user->apellido_materno}} que Cursa estudios Universitarios en la UNHEVAL Escuela Profesional de {{$dj->cuadrofamiliar->user->estudiante->escuela->escuela}} en {{$dj->cuadrofamiliar->user->estudiante->anio_estudio}} año.</p><br>

      <p>DECLARO BAJO JURAMENTO: </p>
      <P>Tener un trabajo independiente en la cual desempeño como {{$dj->desempenio_como}}, percibiendo un haber mensual de S/ {{$dj->haber_mensual}} y teniendo una carga familiar de {{$dj->n_hijos}} hijos menores en edad escolar. Apoyo a mi hijo/tutorando en forma mensual con S/ {{$dj->apoyo_mesual}}. Para los gastos de estudio, alimentación y alquiler de cuarto.</P>
      <p>Así mismo debo manifestarle que tiene otros gastos como {{$dj->otros_gastos}}.</p><br>
      <p>En caso de falsedad me someto a las sanciones correspondiete a Ley.</p>
      <div align="right"><br><br><br><br>
      <p><i>Huánuco {{$dj->created_at->format('d')}} de 
        <?php 
        switch($dj->created_at->format('F')) {
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
      {{$month}} {{$dj->created_at->format('Y')}}</i>
    </p>
      <br><br><br><br><br>
      <p>...........................................</p>
      <p>DNI N° {{$dj->cuadrofamiliar->dni}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      </div>
    </div>
  @endif
    <br>

  </div>
  </body>
</html>