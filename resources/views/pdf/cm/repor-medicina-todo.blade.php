<html>
<?php Carbon\Carbon::setLocale('es'); $fn= Carbon\Carbon::parse($user->f_nac); ?>
  <head>
    <title>Medicina - Reporte </title>
    <meta http-equiv="Content-Type" content="text/html;">
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <style>
      @page { margin: 110px 40px 85px 40px;/*ejes: arriba, derecha, abajo, izquierda*/}
      #header { position: fixed; left: 0px; top: -115px; right: 0px; height: 115px; /*background-color: blue;*/ }
      #footer { position: fixed; left: 0px; bottom: -90px; right: 0px; height: 50px; /*background-color: lightblue;*/ font-style: italic;}
      #footer .page:after { content: counter(page, upper-arabic); /*cambiar arabic por roman si se quiere numeros romanos*/ }

      /*Tablas*/
      .tth{font-size:16px;font-weight:normal;background:#e8edff; padding:4px;}
      .ttd{font-size:14px;padding: 4px;}
      .h-img{
        margin-top: 20px;
      }
      p{
        margin:5px;
        margin-left: 15px;
      }
      .separador{
          border: 0.5px dotted; 
      }


    </style>
</head>
<body>
  <div id="header">
    <table width="100%">
      <tr align="left">
        <td><img src="imagenes/unheval-logo.png" height="70px" class="h-img"></td>
        <td align="center">
          <h3 style="font-size: 15px; margin-bottom:0;">UNIVERSIDAD NACIONAL "HERMILIO VALDIZÁN" HUÁNUCO</h3>
          <p style="font-size: 14px; margin-bottom:0;"><b>DIRECCIÓN DE BIENESTAR UNIVERSITARIO</b></p>
          <p style="font-size: 13px; margin-bottom:0;"><b>OFICINA DE BIENESTAR UNIVERSITARIO</b></p>
          <p style="font-size: 13px;margin-bottom:0;"><b>UNIDAD DE SERVICIOS UNIVERSITARIOS - CENTRO MÉDICO</b></p>
        </td>
        <td align="right"><img src="imagenes/unheval-logo.png" height="70px;" class="h-img"></td>
      </tr>
    </table>
    <hr width="80%" style="margin-top: 0">
  </div>

  <div id="footer">
    <p class="page" style="border-top: 1px solid;" align="center">
      Av. Universitaria N° 600 - Cayhuayna Telf. 064-512341 Anexo 214
    </p>
  </div>
  <div id="content" style="margin-left: 30px; margin-right: 30px;"><br>
        
    <h2 align="center" style="font-size: 18px; font-family: fantasy;">FICHA CLÍNICA MÉDICA</h2>

    <div>
      <h4>I. FILIACIÓN</h4>
      <p><b>DNI: </b>{{$user->dni}}</p>
      @if($user->tipo_user=='5')
      <p><b>Código Universitario: </b>{{$user->estudiante->cod_univ}}</p>
      @endif
      <p><b>Apellidos y Nombres: </b>{{$user->apellido_paterno.' '.$user->apellido_materno.' '.$user->nombres}}</p>
       @if($user->tipo_user=='5')
      <p><b>Escuela Profesional: </b>{{$user->estudiante->escuela->escuela}}</p>
       @endif
      <p><b>Dirección: </b>{{$user->domicilio.' '.$user->domicilio_n}}</p>
      <p><b>Lugar de Nacimiento: </b>{{$user->distrito_naci->distrito.' - '.$user->distrito_naci->provincia->provincia.' - '.$user->distrito_naci->provincia->departamento->departamento}}</p>
      <p><b>Estado Civil: </b>{{$user->estcivil->est_civil}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b>Sexo: </b>@if($user->genero=='1')Masculino @else Femenino @endif</p>
      <p><b>Edad: </b>{{Carbon\Carbon::createFromDate(
                              $fn->format('Y'),
                              $fn->format('m'),
                              $fn->format('d')
                            )->age.' Años'}}
      </p> 
      <p><b>Fecha de Nacimiento: </b>{{Carbon\Carbon::parse($user->f_nac)->format('d/m/Y')}}</p>
      <p><b>Ocupación: </b>{{App\CuadroFamiliar::where('parentesco','YO')->where('user_id',$user->id)->first()->ocupacion}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Religión: </b>{{$user->religion->religion}}</p><br>
      
      <hr class="separador">

      <h4>II. ANTECEDENTES</h4>
      <p><b>a) Personal:</b></p>
      @if($antec0->c_alcohol=='1' || 
          $antec0->c_droga=='1' || 
          $antec0->c_tabaco=='1' || 
          $antec0->c_cafe=='1' || 
          $antec0->p_hepatitis=='1' || 
          $antec0->p_tifoidea=='1' || 
          $antec0->p_tbc=='1' || 
          $antec0->p_hta=='1' || 
          $antec0->p_dm=='1' || 
          $antec0->p_asma=='1' || 
          $antec0->p_otros=='1')
      <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" width="100%">
      <thead>
        <tr>
          <th class="tth">Consume</th>
          <th class="tth">Patológicos</th>
          <th class="tth">Qx</th>
        </tr>
      </thead>
      <tbody>
        <tr style="border: 1px solid black;">
          <td class="ttd">
            <ul style="font-size: 15px;">
              @if($antec0->c_alcohol=='1')<li>ALCOHOL</li>@endif 
              @if($antec0->c_droga=='1')<li>DROGA</li>@endif
              @if($antec0->c_tabaco=='1')<li>TABACO</li>@endif
              @if($antec0->c_cafe=='1')<li>CAFÉ</li>@endif
            </ul>
         </td>
          <td class="ttd">
             <ul style="font-size: 15px;">
              @if($antec0->p_hepatitis=='1')<li>HEPATITIS</li>@endif 
              @if($antec0->p_tifoidea=='1')<li>TIFOIDEA</li>@endif
              @if($antec0->p_tbc=='1')<li>TBC</li>@endif
              @if($antec0->p_hta=='1')<li>HTA</li>@endif
              @if($antec0->p_dm=='1')<li>DM</li>@endif
              @if($antec0->p_asma=='1')<li>ASMA</li>@endif
              @if($antec0->p_otros=='1')<li>Otros: {{$antec0->p_otros_desc}}</li>@endif
            </ul>
          </td>
          <td><p>{{$antec0->qx}}</p></td>
        </tr>
      </tbody>
    </table><br>
     @else 
    <p>&nbsp;&nbsp;&nbsp;&nbsp;Ninguno</p>
    @endif
    
    <p><b>b) Familiar:</b></p>
    @if($antec0->c_alcohol=='1' || 
          $antec1->c_droga=='1' || 
          $antec1->c_tabaco=='1' || 
          $antec1->c_cafe=='1' || 
          $antec1->p_hepatitis=='1' || 
          $antec1->p_tifoidea=='1' || 
          $antec1->p_tbc=='1' || 
          $antec1->p_hta=='1' || 
          $antec1->p_dm=='1' || 
          $antec1->p_asma=='1' || 
          $antec1->p_otros=='1')
    <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" width="100%">
      <thead>
        <tr>
          <th class="tth">Consume</th>
          <th class="tth">Patológicos</th>
          <th class="tth">Qx</th>
        </tr>
      </thead>
      <tbody>
        <tr style="border: 1px solid black;">
          <td class="ttd">
            <ul style="font-size: 15px;">
              @if($antec1->c_alcohol=='1')<li>ALCOHOL</li>@endif 
              @if($antec1->c_droga=='1')<li>DROGA</li>@endif
              @if($antec1->c_tabaco=='1')<li>TABACO</li>@endif
              @if($antec1->c_cafe=='1')<li>CAFÉ</li>@endif
            </ul>
         </td>
          <td class="ttd">
             <ul style="font-size: 15px;">
              @if($antec1->p_hepatitis=='1')<li>HEPATITIS</li>@endif 
              @if($antec1->p_tifoidea=='1')<li>TIFOIDEA</li>@endif
              @if($antec1->p_tbc=='1')<li>TBC</li>@endif
              @if($antec1->p_hta=='1')<li>HTA</li>@endif
              @if($antec1->p_dm=='1')<li>DM</li>@endif
              @if($antec1->p_asma=='1')<li>ASMA</li>@endif
              @if($antec1->p_otros=='1')<li>Otros: {{$antec1->p_otros_desc}}</li>@endif
            </ul>
          </td>
          <td><p>{{$antec1->qx}}</p></td>
        </tr>
      </tbody>
    </table><br>
     @else 
    <p>&nbsp;&nbsp;&nbsp;&nbsp;Ninguno</p>
    @endif
    
    <h4>III. EXAMEN FÍSICO</h4>
   @foreach($medicinas as $med)
       <br><hr class="separador">
      <p><i><span style="background-color: yellow; padding: 5px;">
        Código: {{$med->id}}</span></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <b>Fecha: </b>{{$med->created_at->format('d/m/Y')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <b>Médico: </b>{{$med->medico->nombres.' '.$med->medico->apellido_paterno.' '.$med->medico->apellido_materno}}
      </p>
      <hr class="separador">
    <p>
      <b>TE: </b>{{$med->te}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b>FI: </b>{{$med->fi}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b>CE: </b>{{$med->ce}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p><br>

    <p><b>RELATO DE ENFERMEDAD</b></p>
      <p>{{$med->relato_enf}}</p><br>
      <p>
         <b>FC: </b>{{$med->triaje_fc}}x'&nbsp;&nbsp;
         <b>FR: </b>{{$med->triaje_fr}}x'&nbsp;&nbsp;
         <b>T°: </b>{{$med->triaje_to}}C°&nbsp;&nbsp;
         <b>P/A: </b>{{$med->triaje_pa}}mmHg&nbsp;&nbsp;
         <b>P: </b>{{$med->triaje_p}}Kg&nbsp;&nbsp;
         <b>T: </b>{{$med->triaje_t}}cm&nbsp;&nbsp;
         <b>IMC: </b>{{$med->triaje_imc}}Kg/m2sc&nbsp;&nbsp;
      </p><br>
         
      <p><b>IMP DX</b></p>
      <p>{{$med->imp_dx}}</p><br>

      <p><b>TTO</b></p>
      <p>{{$med->tto_descripcion}}</p><br>

      <?php $mps=App\CmMedProc::where('medicina_id',$med->id)->get(); ?>
      <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" width="100%">
         <thead>
         <tr>
            <th class="tth center" colspan="2">PROCEDIMIENTOS</th>
         </tr>
         <tr>
            <th class="tth center">Cant / Unids.</th>
            <th class="tth center">Procedimientos</th>
         </tr>
         </thead>
         <tbody>
         @foreach($mps as $mp)
           <tr style="border: 1px solid black;">
             <td class="ttd" align="center">{{$mp->cantidad}}</td>
             <td class="ttd"> {{$mp->cmprocedimiento->procedimiento}}</td>
           </tr>
         @endforeach
         </tbody>
    </table><br><br>

    <?php $mms=App\MedMed::where('medicina_id',$med->id)->get(); ?>
      <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" width="100%">
         <thead>
         <tr>
            <th class="tth center" colspan="4">MEDICAMENTOS</th>
         </tr>
         <tr>
            <th class="tth center">Cantidad</th>
            <th class="tth center">Nombre</th>
            <th class="tth center">Presentación</th>
            <th class="tth center">Indicaciones</th>
         </tr>
         </thead>
         <tbody>
         @foreach($mms as $m)
           <tr style="border: 1px solid black;">
               <td class="ttd"  align="center">{{$m->cantidad}}</td>
               <td class="ttd">{{$m->medicamento->medicamento}}</td>
               <td class="ttd">{{$m->medicamento->presentacion}}</td>
               <td class="ttd"> {{$m->indicaciones}}</td>
           </tr>
         @endforeach
         </tbody>
    </table><br>
     @if($med->ex_aux != '')
      <p><b>Examen Auxiliar: </b>{{$med->ex_aux}}</p>
    @endif 

    @if($med->cita != '0000-00-00')
      <p><b>PRÓXIMA CITA: </b>{{$med->cita}}</p>
    @endif  
   @endforeach

    </div><br><br>
    <div align="right">
      <p>
        <p><i>Huánuco {{$med->created_at->format('d')}} de 
        <?php 
        switch($med->created_at->format('F')) {
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
      {{$month}} {{$med->created_at->format('Y')}}</i>
    </p><br><br><br><br><br><br><br><br>
      </p>
      <p>_____________________<br>Firma y Sello&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    </div>
    <br>

  </div>
  </body>
</html>