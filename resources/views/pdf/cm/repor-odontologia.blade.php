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
  <div id="content" style="margin-left: 30px; margin-right: 30px;"><br>
    <div align="left">
      <i><span style="background-color: yellow; padding: 10px;">Código: {{$odontologias->id}}</span></i>
    </div>
    
    <h2 align="center" style="font-size: 18px; font-family: fantasy;">FICHA CLINICA ODONTOLÓGICA</h2>

    <div>
      <h4>FILIACIÓN</h4>
      <p><b>DNI: </b>{{$odontologias->user->dni}}</p>
      <p><b>Código Universitario: </b>{{$odontologias->user->estudiante->cod_univ}}</p>
      <p><b>Apellidos y Nombres: </b>{{$odontologias->user->apellido_paterno.' '.$odontologias->user->apellido_materno.' '.$odontologias->user->nombres}}</p>
      <p><b>Escuela Profesional: </b>{{$odontologias->user->estudiante->escuela->escuela}}</p>
      <p><b>Dirección: </b>{{$odontologias->user->domicilio.' '.$odontologias->user->domicilio_n}}</p>
      <p><b>Lugar de Nacimiento: </b>{{$odontologias->user->distrito_naci->distrito.' - '.$odontologias->user->distrito_naci->provincia->provincia.' - '.$odontologias->user->distrito_naci->provincia->departamento->departamento}}</p>
      <p><b>Estado Civil: </b>{{$odontologias->user->estcivil->est_civil}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b>Sexo: </b>@if($odontologias->user->genero=='1')Masculino @else Femenino @endif</p>
      <p><b>Fecha de Nacimiento: </b>{{Carbon\Carbon::parse($odontologias->user->f_nac)->format('d/m/Y')}}</p>
      <p><b>Ocupación: </b>{{App\CuadroFamiliar::where('parentesco','YO')->where('user_id',$odontologias->user_id)->first()->ocupacion}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Religión: </b>{{$odontologias->user->religion->religion}}</p><br>
      <p><b>Odontologo(a): </b>{{$odontologias->odontologo->nombres.' '.$odontologias->odontologo->apellido_paterno.' '.$odontologias->odontologo->apellido_materno}}</p><br>
      <hr class="separador">

      <h4>I. MOTIVO DE CONSULTA</h4>
      <p>{{$odontologias->i_motivo_consulta}}</p>            
      <br>
      <h4>II. ESTADO DE SALUD GENERAL</h4>
      <ul>
        <li>Presenta alguna enfermedad sistemica actualmente: @if($odontologias->ii_a=='1')SI @else NO @endif</li>
        <li>Presenta alguna enfermedad sistemica anteriormente: @if($odontologias->ii_b=='1')SI @else NO @endif</li>
        <li>Alergico a algún medicamento o sustencia: @if($odontologias->ii_b=='1')SI @else NO @endif</li>
        <li>Antecedentes de operaciones: @if($odontologias->ii_c=='1')SI @else NO @endif</li>
      </ul>
      <h4>III. ESTADO DE SALUD BUCODENTAL</h4>
      <p>a) Examen Odontológico: </p>
      <div align="center">
        <img src="imagenes/odontograma.png">
      </div>
      <div align="center"><?php $estilo="background-color: yellow;";?>
        <p>
          <span style="@if($odontologias->iii_xviii=='1') {{$estilo}} @endif">18</span>
          <span style="@if($odontologias->iii_xvii=='1') {{$estilo}} @endif ">17</span>
          <span style="@if($odontologias->iii_xvi=='1') {{$estilo}} @endif ">16</span>
          <span style="@if($odontologias->iii_xv=='1') {{$estilo}} @endif ">15</span>
          <span style="@if($odontologias->iii_xiv=='1') {{$estilo}} @endif ">14</span>
          <span style="@if($odontologias->iii_xiii=='1') {{$estilo}} @endif ">13</span>
          <span style="@if($odontologias->iii_xii=='1') {{$estilo}} @endif ">12</span>
          <span style="@if($odontologias->iii_xi=='1') {{$estilo}} @endif ">11</span> - 
          <span style="@if($odontologias->iii_xxi=='1') {{$estilo}} @endif ">21</span>
          <span style="@if($odontologias->iii_xxii=='1') {{$estilo}} @endif ">22</span>
          <span style="@if($odontologias->iii_xxiii=='1') {{$estilo}} @endif ">23</span>
          <span style="@if($odontologias->iii_xxiv=='1') {{$estilo}} @endif ">24</span>
          <span style="@if($odontologias->iii_xxv=='1') {{$estilo}} @endif ">25</span>
          <span style="@if($odontologias->iii_xxvi=='1') {{$estilo}} @endif ">26</span>
          <span style="@if($odontologias->iii_xxvii=='1') {{$estilo}} @endif ">27</span>
          <span style="@if($odontologias->iii_xxviii=='1') {{$estilo}} @endif ">28</span>
          <br>
          <span style="@if($odontologias->iii_lv=='1') {{$estilo}} @endif ">55</span>
          <span style="@if($odontologias->iii_liv=='1') {{$estilo}} @endif ">54</span>
          <span style="@if($odontologias->iii_liii=='1') {{$estilo}} @endif ">53</span>
          <span style="@if($odontologias->iii_lii=='1') {{$estilo}} @endif ">52</span>
          <span style="@if($odontologias->iii_li=='1') {{$estilo}} @endif ">51</span> - 
          <span style="@if($odontologias->iii_lxi=='1') {{$estilo}} @endif ">61</span>
          <span style="@if($odontologias->iii_lxii=='1') {{$estilo}} @endif ">62</span>
          <span style="@if($odontologias->iii_lxiii=='1') {{$estilo}} @endif ">63</span>
          <span style="@if($odontologias->iii_lxiv=='1') {{$estilo}} @endif ">64</span>
          <span style="@if($odontologias->iii_lxv=='1') {{$estilo}} @endif ">65</span>
          <br>
          <span style="@if($odontologias->iii_lxxxv=='1') {{$estilo}} @endif ">85</span>
          <span style="@if($odontologias->iii_lxxxiv=='1') {{$estilo}} @endif ">84</span>
          <span style="@if($odontologias->iii_lxxxiii=='1') {{$estilo}} @endif ">83</span>
          <span style="@if($odontologias->iii_lxxxii=='1') {{$estilo}} @endif ">82</span>
          <span style="@if($odontologias->iii_lxxxi=='1') {{$estilo}} @endif ">81</span> - 
          <span style="@if($odontologias->iii_lxxi=='1') {{$estilo}} @endif ">71</span>
          <span style="@if($odontologias->iii_lxxii=='1') {{$estilo}} @endif ">72</span>
          <span style="@if($odontologias->iii_lxxiii=='1') {{$estilo}} @endif ">73</span>
          <span style="@if($odontologias->iii_lxxiv=='1') {{$estilo}} @endif ">74</span>
          <span style="@if($odontologias->iii_lxxv=='1') {{$estilo}} @endif ">75</span>
          <br>
          <span style="@if($odontologias->iii_xlviii=='1') {{$estilo}} @endif ">48</span>
          <span style="@if($odontologias->iii_xlvii=='1') {{$estilo}} @endif ">47</span>
          <span style="@if($odontologias->iii_xlvi=='1') {{$estilo}} @endif ">46</span>
          <span style="@if($odontologias->iii_xlv=='1') {{$estilo}} @endif ">45</span>
          <span style="@if($odontologias->iii_xliv=='1') {{$estilo}} @endif ">44</span>
          <span style="@if($odontologias->iii_xliii=='1') {{$estilo}} @endif ">43</span>
          <span style="@if($odontologias->iii_xlii=='1') {{$estilo}} @endif ">42</span>
          <span style="@if($odontologias->iii_xli=='1') {{$estilo}} @endif ">41</span> - 
          <span style="@if($odontologias->iii_xxxi=='1') {{$estilo}} @endif ">31</span>
          <span style="@if($odontologias->iii_xxxii=='1') {{$estilo}} @endif ">32</span>
          <span style="@if($odontologias->iii_xxxiii=='1') {{$estilo}} @endif ">33</span>
          <span style="@if($odontologias->iii_xxxiv=='1') {{$estilo}} @endif ">34</span>
          <span style="@if($odontologias->iii_xxxv=='1') {{$estilo}} @endif ">35</span>
          <span style="@if($odontologias->iii_xxxvi=='1') {{$estilo}} @endif ">36</span>
          <span style="@if($odontologias->iii_xxxvii=='1') {{$estilo}} @endif ">37</span>
          <span style="@if($odontologias->iii_xxxvii=='1') {{$estilo}} @endif ">38</span>
        </p>
      </div>

      <p>b) Examen bucal:</p>
      <p>Con patologias en...</p>
      <ul>
        <li>Encias: @if($odontologias->iii_b_a=='1')SI @else NO @endif</li>
        <li>ATM: @if($odontologias->iii_b_b=='1')SI @else NO @endif</li>
        <li>Mucosas: @if($odontologias->iii_b_c=='1')SI @else NO @endif</li>
        <li>Labios: @if($odontologias->iii_b_d=='1')SI @else NO @endif</li>
        <li>Lengua: @if($odontologias->iii_b_e=='1')SI @else NO @endif</li>
        <li>Otros: @if($odontologias->iii_b_f=='1') {{$odontologias->iii_b_otros}} @else NO @endif</li>
      </ul>

      <h4>IV. DIAGNÓSTICO</h4>
      <p>{{$odontologias->iv_diagnostico}}</p>

      <h4>V. PLAN DE TRATAMIENTO </h4>
    <?php $procedimientos = App\CmOdoProc::where('odontologia_id',$odontologias->id)->get(); ?>
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
    <?php $medicamentos = App\CmOdoMed::where('odontologia_id',$odontologias->id)->get(); ?>
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
    <?php $atenciones = App\CmOdoAtencion::where('odontologia_id',$odontologias->id)->get(); ?>
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
    </table><br><hr class="separador">

    
    </div><br><br>
    <div align="right">
      <p>
        <p><i>Huánuco {{$odontologias->created_at->format('d')}} de 
        <?php 
        switch($odontologias->created_at->format('F')) {
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
      {{$month}} {{$odontologias->created_at->format('Y')}}</i>
    </p><br><br><br><br><br><br><br><br>
      </p>
      <p>_____________________<br>Firma y Sello&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    </div>
    <br>

  </div>
  </body>
</html>