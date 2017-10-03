<html>
  <head>
    <title>Odontología - Reporte </title>
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
      .tth{font-size:16px;font-weight:normal;background:#e8edff; padding:8px;}
      .ttd{font-size:14px;padding: 8px;}
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
  <div id="content" style="margin-left: 30px; margin-right: 30px;">
    <h2 align="center" style="font-size: 18px; font-family: fantasy;">FICHA CLÍNICA ODONTOLÓGICA</h2>
    <div>
      <h4>FILIACIÓN</h4>
      <p><b>DNI: </b>{{$estudiante->user->dni}}</p>
      <p><b>Código Universitario: </b>{{$estudiante->cod_univ}}</p>
      <p><b>Apellidos y Nombres: </b>{{$estudiante->user->apellido_paterno.' '.$estudiante->user->apellido_materno.' '.$estudiante->user->nombres}}</p>
      <p><b>Escuela Profesional: </b>{{$estudiante->escuela->escuela}}</p>
      <p><b>Dirección: </b>{{$estudiante->user->domicilio.' '.$estudiante->user->domicilio_n}}</p>
      <p><b>Lugar de Nacimiento: </b>{{$estudiante->user->distrito_naci->distrito.' - '.$estudiante->user->distrito_naci->provincia->provincia.' - '.$estudiante->user->distrito_naci->provincia->departamento->departamento}}</p>
      <p><b>Estado Civil: </b>{{$estudiante->user->estcivil->est_civil}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b>Sexo: </b>@if($estudiante->user->genero=='1')Masculino @else Femenino @endif</p>
      <p><b>Fecha de Nacimiento: </b>{{Carbon\Carbon::parse($estudiante->user->f_nac)->format('d/m/Y')}}</p>
      <p><b>Ocupación: </b>{{App\CuadroFamiliar::where('parentesco','YO')->where('user_id',$estudiante->user_id)->first()->ocupacion}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Religión: </b>{{$estudiante->user->religion->religion}}</p>
      <br>
@foreach($odontologias as $odo)
      <hr class="separador">
      <p><i><span style="background-color: yellow; padding: 5px;">
        Código: {{$odo->id}}</span></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <b>Fecha: </b>{{$odo->created_at->format('d/m/Y')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <b>Odontologo(a): </b>{{$odo->odontologo->nombres.' '.$odo->odontologo->apellido_paterno.' '.$odo->odontologo->apellido_materno}}
      </p>
      <hr class="separador">
      <h4>I. MOTIVO DE CONSULTA</h4>
      <p>{{$odo->i_motivo_consulta}}</p>            

      <h4>II. ESTADO DE SALUD GENERAL</h4>
      <ul>
        <li>Presenta alguna enfermedad sistemica actualmente: @if($odo->ii_a=='1')SI @else NO @endif</li>
        <li>Presenta alguna enfermedad sistemica anteriormente: @if($odo->ii_b=='1')SI @else NO @endif</li>
        <li>Alergico a algún medicamento o sustencia: @if($odo->ii_b=='1')SI @else NO @endif</li>
        <li>Antecedentes de operaciones: @if($odo->ii_c=='1')SI @else NO @endif</li>
      </ul>
      <h4>III. ESTADO DE SALUD BUCODENTAL</h4>
      <p>a) Examen Odontológico: </p>
      <div align="center">
        <img src="imagenes/odontograma.png">
      </div>
      <div align="center"><?php $estilo="background-color: yellow;";?>
        <p>
          <span style="@if($odo->iii_xviii=='1') {{$estilo}} @endif">18</span>
          <span style="@if($odo->iii_xvii=='1') {{$estilo}} @endif ">17</span>
          <span style="@if($odo->iii_xvi=='1') {{$estilo}} @endif ">16</span>
          <span style="@if($odo->iii_xv=='1') {{$estilo}} @endif ">15</span>
          <span style="@if($odo->iii_xiv=='1') {{$estilo}} @endif ">14</span>
          <span style="@if($odo->iii_xiii=='1') {{$estilo}} @endif ">13</span>
          <span style="@if($odo->iii_xii=='1') {{$estilo}} @endif ">12</span>
          <span style="@if($odo->iii_xi=='1') {{$estilo}} @endif ">11</span> - 
          <span style="@if($odo->iii_xxi=='1') {{$estilo}} @endif ">21</span>
          <span style="@if($odo->iii_xxii=='1') {{$estilo}} @endif ">22</span>
          <span style="@if($odo->iii_xxiii=='1') {{$estilo}} @endif ">23</span>
          <span style="@if($odo->iii_xxiv=='1') {{$estilo}} @endif ">24</span>
          <span style="@if($odo->iii_xxv=='1') {{$estilo}} @endif ">25</span>
          <span style="@if($odo->iii_xxvi=='1') {{$estilo}} @endif ">26</span>
          <span style="@if($odo->iii_xxvii=='1') {{$estilo}} @endif ">27</span>
          <span style="@if($odo->iii_xxviii=='1') {{$estilo}} @endif ">28</span>
          <br>
          <span style="@if($odo->iii_lv=='1') {{$estilo}} @endif ">55</span>
          <span style="@if($odo->iii_liv=='1') {{$estilo}} @endif ">54</span>
          <span style="@if($odo->iii_liii=='1') {{$estilo}} @endif ">53</span>
          <span style="@if($odo->iii_lii=='1') {{$estilo}} @endif ">52</span>
          <span style="@if($odo->iii_li=='1') {{$estilo}} @endif ">51</span> - 
          <span style="@if($odo->iii_lxi=='1') {{$estilo}} @endif ">61</span>
          <span style="@if($odo->iii_lxii=='1') {{$estilo}} @endif ">62</span>
          <span style="@if($odo->iii_lxiii=='1') {{$estilo}} @endif ">63</span>
          <span style="@if($odo->iii_lxiv=='1') {{$estilo}} @endif ">64</span>
          <span style="@if($odo->iii_lxv=='1') {{$estilo}} @endif ">65</span>
          <br>
          <span style="@if($odo->iii_lxxxv=='1') {{$estilo}} @endif ">85</span>
          <span style="@if($odo->iii_lxxxiv=='1') {{$estilo}} @endif ">84</span>
          <span style="@if($odo->iii_lxxxiii=='1') {{$estilo}} @endif ">83</span>
          <span style="@if($odo->iii_lxxxii=='1') {{$estilo}} @endif ">82</span>
          <span style="@if($odo->iii_lxxxi=='1') {{$estilo}} @endif ">81</span> - 
          <span style="@if($odo->iii_lxxi=='1') {{$estilo}} @endif ">71</span>
          <span style="@if($odo->iii_lxxii=='1') {{$estilo}} @endif ">72</span>
          <span style="@if($odo->iii_lxxiii=='1') {{$estilo}} @endif ">73</span>
          <span style="@if($odo->iii_lxxiv=='1') {{$estilo}} @endif ">74</span>
          <span style="@if($odo->iii_lxxv=='1') {{$estilo}} @endif ">75</span>
          <br>
          <span style="@if($odo->iii_xlviii=='1') {{$estilo}} @endif ">48</span>
          <span style="@if($odo->iii_xlvii=='1') {{$estilo}} @endif ">47</span>
          <span style="@if($odo->iii_xlvi=='1') {{$estilo}} @endif ">46</span>
          <span style="@if($odo->iii_xlv=='1') {{$estilo}} @endif ">45</span>
          <span style="@if($odo->iii_xliv=='1') {{$estilo}} @endif ">44</span>
          <span style="@if($odo->iii_xliii=='1') {{$estilo}} @endif ">43</span>
          <span style="@if($odo->iii_xlii=='1') {{$estilo}} @endif ">42</span>
          <span style="@if($odo->iii_xli=='1') {{$estilo}} @endif ">41</span> - 
          <span style="@if($odo->iii_xxxi=='1') {{$estilo}} @endif ">31</span>
          <span style="@if($odo->iii_xxxii=='1') {{$estilo}} @endif ">32</span>
          <span style="@if($odo->iii_xxxiii=='1') {{$estilo}} @endif ">33</span>
          <span style="@if($odo->iii_xxxiv=='1') {{$estilo}} @endif ">34</span>
          <span style="@if($odo->iii_xxxv=='1') {{$estilo}} @endif ">35</span>
          <span style="@if($odo->iii_xxxvi=='1') {{$estilo}} @endif ">36</span>
          <span style="@if($odo->iii_xxxvii=='1') {{$estilo}} @endif ">37</span>
          <span style="@if($odo->iii_xxxvii=='1') {{$estilo}} @endif ">38</span>
        </p>
      </div>

      <p>b) Examen bucal:</p>
      <p>Con patologias en...</p>
      <ul>
        <li>Encias: @if($odo->iii_b_a=='1')SI @else NO @endif</li>
        <li>ATM: @if($odo->iii_b_b=='1')SI @else NO @endif</li>
        <li>Mucosas: @if($odo->iii_b_c=='1')SI @else NO @endif</li>
        <li>Labios: @if($odo->iii_b_d=='1')SI @else NO @endif</li>
        <li>Lengua: @if($odo->iii_b_e=='1')SI @else NO @endif</li>
        <li>Otros: @if($odo->iii_b_f=='1') {{$odo->iii_b_otros}} @else NO @endif</li>
      </ul>

      <h4>IV. DIAGNÓSTICO</h4>
      <p>{{$odo->iv_diagnostico}}</p>

      <h4>V. PLAN DE TRATAMIENTO </h4>
    <?php $procedimientos = App\CmOdoProc::where('odontologia_id',$odo->id)->get(); ?>
    <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" width="100%">
      <thead>
        <tr>
          <th class="tth">Cant / Unids.</th>
          <th class="tth">Procedimiento</th>
          <th class="tth">Precio (S/)</th>
        </tr>
      </thead>

      <tbody>
      @foreach($procedimientos as $p)
        <tr style="border: 1px solid black;">
          <td class="ttd" align="center">{{$p->cantidad}}</td>
          <td class="ttd">{{$p->cmprocedimiento->procedimiento}}</td>
          <td class="ttd">{{$p->cmprocedimiento->precio}}</td>
        </tr>
      @endforeach
      </tbody>
    </table><br>

    <h4>VI. MEDICAMENTOS </h4>
    <?php $medicamentos = App\CmOdoMed::where('odontologia_id',$odo->id)->get(); ?>
    <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" width="100%">
      <thead>
        <tr>
          <th class="tth">Cant / Und.</th>
          <th class="tth">Medicamento</th>
          <th class="tth">Indicación</th>
        </tr>
      </thead>
      <tbody>
      
      @foreach($medicamentos as $p)
        <tr style="border: 1px solid black;">
          <td class="ttd" align="center">{{$p->cantidad}}</td>
          <td class="ttd">{{$p->medicamento->medicamento.' - '.$p->medicamento->presentacion}}</td>
          <td class="ttd">{{$p->indicaciones}}</td>
        </tr>
      @endforeach
      </tbody>
    </table><br>

    <h4><b>VII. ATENCIONES</b></h4>
    <?php $atenciones = App\CmOdoAtencion::where('odontologia_id',$odo->id)->get(); ?>
    <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" width="100%">
      <thead>
        <tr>
          <th class="tth">Fecha</th>
          <th class="tth">Procedimiento</th>
          <th class="tth">Observación</th>
        </tr>
      </thead>
      <tbody>
      
      @foreach($atenciones as $p)
        <tr style="border: 1px solid black;">
          <td class="ttd" align="center">{{Carbon\Carbon::parse($p->created_at)->format('d/m/Y')}}</td>
          <td class="ttd">{{$p->cmprocedimiento->procedimiento}}</td>
          <td class="ttd">{{$p->obs}}</td>
        </tr>
      @endforeach
      </tbody>
    </table><br>
@endforeach

<hr class="separador">
    
    </div><br><br>
    <div align="right">
      <p>
        <p><i>Huánuco {{$date->format('d')}} de 
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
      {{$month}} {{$date->format('Y')}}</i>
    </p><br><br><br><br><br><br><br><br>
      </p>
      <p>_____________________<br>Firma y Sello&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    </div>
    <br>

  </div>
  </body>
</html>