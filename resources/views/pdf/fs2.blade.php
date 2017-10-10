<html>
<?php
  $fn= Carbon\Carbon::parse($user->f_nac);
  $edad=Carbon\Carbon::createFromDate($fn->format('Y'),
        $fn->format('m'),
        $fn->format('d')
      )->age;
?>
  <head>
    <title>Tamizaje Psicológico </title>
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
      .titulo-fs{
        font-size: 14px;
      }
      .texto-fs{
        margin-top: -8px;
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
    Página </p>
  </div>
  <div id="content" style="margin-left: 30px; margin-right: 30px;">

    <h2 align="center" style="font-size: 20px; font-family: fantasy;"><u><br>TAMIZAJE PSICOLÓGICO</u><br></h2>

      <h4 class="titulo-fs">I.- DATOS GENERALES DEL ALUMNO</h4>
      <div class="contenido-fs">
        <p class="texto-fs"><b>Apellidos y Nombres: </b>{{$user->apellido_paterno.' '.$user->apellido_materno.' '.$user->nombres}}</p>
        <p class="texto-fs"><b>Código: </b>{{$user->estudiante->cod_univ}}</p>
        <p class="texto-fs"><b>Fecha de Nacimiento (edad): </b>{{$user->f_nac.' ('.$edad.')'}}</p>
        <p class="texto-fs"><b>DNI: </b>{{$user->dni}}</p>
        <p class="texto-fs"><b>E-mail: </b>{{$user->email}}</p>
        <p class="texto-fs"><b>Domicilio: </b>{{$user->domicilio.' '.$user->n_domicilio}}</p>
        <p class="texto-fs"><b>Teléfono: </b>{{$user->telefono}}</p>
        <p class="texto-fs"><b>Fecha de Ingreso-UNHEVAL: </b>@if($user->f_unheval!='0000-00-00'){{$user->f_unheval}}@endif</p>
        <p class="texto-fs"><b>Facultad: </b>{{$user->estudiante->escuela->facultad->facultad}}</p>
        <p class="texto-fs"><b>E.P: </b>{{$user->estudiante->escuela->escuela}}</p>
        <p class="texto-fs"><b>Año de Estudios: </b>{{$user->estudiante->anio_estudio}}</p>
        <p class="texto-fs"><b>Tipo Sangre: </b>{{$user->tipo_sangre}}</p>
        <p class="texto-fs"><b>Nacionalidad: </b>{{$user->nacionalidad}}</p>
        <p class="texto-fs"><b>Religión: </b>{{$user->religion->religion}}</p>
        <p class="texto-fs"><b>Estado Civil: </b>{{$user->estcivil->est_civil}}</p>
        <p class="texto-fs"><b>Vive con: </b></p>
              <ul style="margin-top: -0; margin-left: 60px;">
              @if($user->vc_padre=='1')
                <li>Padre</li>
              @endif
              @if($user->vc_madre=='1')
                <li>Madre</li>
              @endif
              @if($user->vc_hermano=='1')
                <li>Hermano</li>
              @endif
              @if($user->vc_conyugue=='1')
                <li>Conyugue</li>
              @endif
              @if($user->vc_pension=='1')
                <li>Pension</li>
              @endif
              @if($user->vc_otros=='1')
                <li>Otros</li>
              @endif
              </ul>
        <br>
        <p class="texto-fs"><b>1.1. <u>Colegio de procedencia</u></b></p>
        <table style="margin-left: 15px;" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
          <thead>
            <tr>
              <th class="tth">Grado de Instrucción</th>
              <th class="tth">Nombre del Colegio</th>
              <th class="tth">Tipo del Colegio</th>
              <th class="tth">Dist./Prov./Dep.</th>
              <th class="tth">Año</th>
              <th class="tth">Pensión S/</th>
            </tr>
          </thead>
          <tbody>
            <tr style="margin-left: 5px; border: 1px solid black;">
              <td class="ttd">4to. Secundaria</td>
              <td class="ttd">{{$user->estudiante->colegio->iv_colegio}}</td>
              <td class="ttd">{{$user->estudiante->colegio->iv_tipocolegio->tipo}}</td>
              <td class="ttd">{{$user->estudiante->colegio->iv_distrit->distrito}} / 
              {{$user->estudiante->colegio->iv_distrit->provincia->provincia}} / 
              {{$user->estudiante->colegio->iv_distrit->provincia->departamento->departamento}}</td>
              <td class="ttd">{{$user->estudiante->colegio->iv_fecha}}</td>
              <td class="ttd">{{$user->estudiante->colegio->iv_pension}}</td>
            </tr>
            <tr style="margin-left: 5px; border: 1px solid black;">
              <td class="ttd">5to. Secundaria</td>
              <td class="ttd">{{$user->estudiante->colegio->v_colegio}}</td>
              <td class="ttd">{{$user->estudiante->colegio->v_tipocolegio->tipo}}</td>
              <td class="ttd">{{$user->estudiante->colegio->v_distrit->distrito}} / 
              {{$user->estudiante->colegio->v_distrit->provincia->provincia}} / 
              {{$user->estudiante->colegio->v_distrit->provincia->departamento->departamento}}</td>
              <td class="ttd">{{$user->estudiante->colegio->v_fecha}}</td>
              <td class="ttd">{{$user->estudiante->colegio->v_pension}}</td>
            </tr>
          </tbody>
        </table>
        <br>
        <p class="texto-fs"><b>1.2. <u>Modalidad por la que Logró el Ingreso:</u></b></p>
        <p class="ttd">{{$user->estudiante->m_ingreso->modalidad}}</p>
      </div>
      <h4 class="titulo-fs">II.- CUADRO FAMILIAR</h4>
      <div class="contenido-fs">
        <table style="margin-left: 15px;" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
          <thead>
            <tr>
              <th class="tth">Nombres y Apellidos</th>
              <th class="tth">Parentesco</th>
              <th class="tth">Edad</th>
              <th class="tth">N° DNI</th>
              <th class="tth">Grado de instrucción</th>
              <th class="tth">Ocupación</th>
              <th class="tth">Lugar de Residencia</th>
            </tr>
          </thead>
          <tbody><?php $cont=0; ?>
              @foreach($cfamiliares as $cfamiliar)
                <?php if($cfamiliar->parentesco=='YO') continue; $cont++;?>
                <tr style="margin-left: 5px; border: 1px solid black;">
                  <td>{{$cfamiliar->nombres}}</td>
                  <td>{{$cfamiliar->parentesco}}</td>
                  <td align="center">
                    <?php 
                     $fn= Carbon\Carbon::parse($cfamiliar->f_nac);
                     echo Carbon\Carbon::createFromDate(
                       $fn->format('Y'),
                       $fn->format('m'),
                       $fn->format('d')
                     )->age;
                    ?>
                  </td>
                  <td>{{$cfamiliar->dni}}</td>
                  <td>{{$instruccion[$cfamiliar->grado_instrucion]}}</td>
                  <td>{{$cfamiliar->ocupacion}}</td>
                  <td>{{$cfamiliar->residencia}}</td>
                </tr>
              @endforeach
              @if($cont==0)
              <tr>
                <td >.</td><td></td><td></td><td></td><td></td><td></td><td></td>
              </tr>
              @endif
          </tbody>
        </table>
        <br>
      <p class="texto-fs"><b>2.1. <u>Relaciones Familiares:</u></b></p>
      <p class="texto-fs"><b>a) Familia: </b>{{$TipoFamilias[$user->estudiante->tipo_familia]}}</p>
      <p class="texto-fs"><b>b) Trato con tus padres: </b>{{$TratoPadres[$user->estudiante->trato_padres]}}</p>
    </div>
    <br>
       
    <br>
    <p>Nota.- Declaro que la información antes detallada es verás, sometiéndome en caso de falsedad a las normas vigentes. </p>
    <?php 
    ?>
    <p align="right"> Pillco Marca <i>{{$date->format('d')}}</i> de 
    <?php 
      switch($date->format('F')) {
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
     <i>{{$month}}</i>
     <i>{{$date->format('Y')}}</i></p><br><br><br><br><br><br>
    <table width="100%">
      <tr align="center">
        <td>......................................................<br>
            Firma del Estudiante<br>
            DNI N° {{$user->dni}}
        </td>
       
      </tr>
    </table>

  </div>
  </body>
</html>