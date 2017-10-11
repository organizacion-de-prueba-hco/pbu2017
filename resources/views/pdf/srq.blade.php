<html>
  <?php Carbon\Carbon::setLocale('es'); $fn= Carbon\Carbon::parse($srq->estudiante->user->f_nac); ?>
  <head>
    <title>Cuestionario S.R.Q. </title>
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
          <h3 style="font-size: 15px; margin-bottom:0;">UNIVERSIDAD NACIONAL HERMILIO VALDIZÁN</h3>
          <p style="font-size: 12px;margin-bottom:0;"><b>VICERRECTORADO ACADÉMICO</b></p>
          <p style="font-size: 12px;margin-bottom:0;"><b>BIENESTAR UNIVERSITARIO</b></p>
          <p style="font-size: 14px;margin-bottom:0;"><b>SERVICIO DE PSICOPEDAGOGÍA</b></p>
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
    <br>
    <div align="right">
      <label>CÓD: <span style="background-color:yellow; padding: 3px;">PSIC - {{$srq->id}} </span></label>
     </div>
    
    <h2 align="center" style="font-size: 20px; font-family: fantasy;">CUESTIONARIO DE SINTOMAS<br>S.R.Q.</h2>

    <div>
      <div style="border: solid 1px black;">
      <p><b>Apellidos y Nombres: </b>{{$srq->estudiante->user->apellido_paterno.' '.$srq->estudiante->user->apellido_materno.' '.$srq->estudiante->user->nombres}}&nbsp;&nbsp;&nbsp;
          <b>DNI: </b>{{$srq->estudiante->user->dni}}
      </p>
      <p>
        <b>Fecha de Nacimiento: </b>{{$fn->format('d-m-Y')}}&nbsp;&nbsp;
        <b>Edad: </b>{{Carbon\Carbon::createFromDate(
                              $fn->format('Y'),
                              $fn->format('m'),
                              $fn->format('d')
                            )->age}}&nbsp;&nbsp;
        <b>Sexo: </b>@if($srq->estudiante->user->genero=='1')Masculino @else Femenino @endif &nbsp;&nbsp;
        <b>Estado Civil: </b>{{$srq->estudiante->user->estcivil->est_civil}}
      </p>
      <p><b>Lugar de Nacimiento: </b>{{$srq->estudiante->user->distrito_naci->distrito.' - '.$srq->estudiante->user->distrito_naci->provincia->provincia.' - '.$srq->estudiante->user->distrito_naci->provincia->departamento->departamento}}</p>
      <p><b>I.E. de procedencia: </b>{{$srq->estudiante->colegio->v_colegio}} </p>
      <p>
        <b>Carrera Profesional: </b>{{$srq->estudiante->escuela->escuela}}
      </p>
      <p><b>Código Universitario: </b>{{$srq->estudiante->cod_univ}}</p>
      <p><b>Con quiénes vive: </b>
              @if($srq->estudiante->user->vc_padre=='1')
                Padre 
              @endif
              @if($srq->estudiante->user->vc_madre=='1')
                Madre 
              @endif 
              @if($srq->estudiante->user->vc_hermano=='1')
                Hermano 
              @endif
              @if($srq->estudiante->user->vc_conyugue=='1')
                Conyugue 
              @endif
              @if($srq->estudiante->user->vc_pension=='1')
                Pension 
              @endif
              @if($srq->estudiante->user->vc_otros=='1')
                Otros 
              @endif
        </p>
        <p>
          <b>Modalidad de Ingreso a la UNHEVAL: </b>{{$srq->estudiante->m_ingreso->modalidad}}
        </p>
        <p>
          <b>N° de teléfono: </b>{{$srq->telefono}}
        </p>
      
      </div>
      <br>
      <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" width="100%">
      <thead>
        <tr>
          <th class="tth">N°</th>
          <th class="tth">PREGUNTAS</th>
          <th class="tth">SI</th>
          <th class="tth">NO</th>
        </tr>
      </thead>

      <tbody>
                        <tr>
                          <td align="center">01</td>
                          <td>¿Tiene frecuentes dolores de cabeza?</td>
                            @if($srq->p_i=='1')
                            <td align="center">X</td>
                            <td></td>
                            @else
                            <td></td>
                            <td align="center">X</td>
                            @endif
                        </tr>
                        <tr>
                          <td align="center">02</td>
                          <td>¿Tiene mal apetito?</td>
                              @if($srq->p_ii=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                          </td>
                        </tr>
                        <tr>
                          <td align="center">03</td>
                          <td>¿Duerme mal?</td>
                            @if($srq->p_iii=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                          </td>
                        </tr>
                        <tr>
                          <td align="center">04</td>
                          <td>¿Se asusta con facilidad?</td>
                          
                              @if($srq->p_iv=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                          </td>
                        </tr>
                        <tr>
                          <td align="center">05</td>
                          <td>¿Sufre de temblor de manos?</td>
                          
                              @if($srq->p_v=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                          </td>
                        </tr>
                        <tr>
                          <td align="center">06</td>
                          <td>¿Se siente nervioso o tenso?</td>
                          
                              @if($srq->p_vi=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                          </td>
                        </tr>
                        <tr>
                          <td align="center">07</td>
                          <td >¿Sufre de mala digestión?</td>
                          
                              @if($srq->p_vii=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                          </td>
                        </tr>
                        <tr>
                          <td align="center">08</td>
                          <td>¿Tiene dificultades para  pensar con claridad?</td>
                          
                              @if($srq->p_viii=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                          </td>
                        </tr>
                        <tr>
                          <td align="center">09</td>
                          <td>¿Se siente triste?</td>
                              @if($srq->p_ix=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                          </td>
                        </tr>
                        <tr>
                          <td align="center">10</td>
                          <td>¿Llora usted con mucha frecuencia?</td>
                          
                              @if($srq->p_x=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">11</td>
                          <td>¿Tiene dificultad en disfrutar sus actividades diarias?</td>
                            @if($srq->p_xi=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">12</td>
                          <td>¿Tiene dificultad para tomar decisiones?</td>
                              @if($srq->p_xii=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr >
                          <td align="center">13</td>
                          <td>¿Tiene dificultad en hacer su trabajo y/o Estudios? (¿sufre usted con su trabajo y/o estudios?)</td>
                              @if($srq->p_xiii=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">14</td>
                          <td>¿Es incapaz de desempeñar un papel útil en su vida?</td>
                          @if($srq->p_xiv=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">15</td>
                          <td>¿Ha perdido interés en las cosas que usualmente hacía?</td>
                              @if($srq->p_xv=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">16</td>
                          <td>¿Siente que usted es una persona inútil?</td>
                              @if($srq->p_xvi=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">17</td>
                          <td>¿Ha tenido la idea de acabar con su vida?</td>
                              @if($srq->p_xvii=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">18</td>
                          <td>¿Se siente cansado todo el tiempo?</td>
                              @if($srq->p_xviii=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">19</td>
                          <td>¿Tiene sensaciones desagradables en su estómago?</td>
                              @if($srq->p_xix=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">20</td>
                          <td>¿Se cansa con facilidad?</td>
                              @if($srq->p_xx=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">21</td>
                          <td>¿Siente usted que alguien ha tratado de herirlo en alguna forma? Ejm: pensar que alguien conspira contra usted, que alguien intenta dañarle, etc.</td>
                              @if($srq->p_xxi=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">22</td>
                          <td>¿Usted se considera una persona mucho más importante que los demás?</td>
                              @if($srq->p_xxii=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">23</td>
                          <td>¿Ha notado interferencias o algo raro en su pensamiento? Ejm. Oír voces, ver cosas que otras personas no pueden ver ni oír, etc.</td>
                              @if($srq->p_xxiii=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">24</td>
                          <td>¿Oye voces sin saber de dónde vienen o que otras personas no pueden oír?</td>
                              @if($srq->p_xxiv=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">25</td>
                          <td>¿Ha tenido convulsiones, ataques o caídas al suelo, con movimientos de brazos y piernas; con mordedura de la lengua o pérdida del conocimiento?</td>
                              @if($srq->p_xxv=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">26</td>
                          <td>¿Alguna vez le ha parecido a su familia, sus amigos, su médico o a su sacerdote que usted estaba bebiendo demasiado licor?</td>
                              @if($srq->p_xxvi=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">27</td>
                          <td>¿Alguna vez ha querido dejar de beber, pero no ha podido?</td>
                              @if($srq->p_xxvii=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">28</td>
                          <td>¿Ha tenido alguna vez dificultades en el trabajo (o estudio) a causa de la bebida, como beber en el trabajo o en el colegio, o faltar a ellos?</td>
                              @if($srq->p_xxviii=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">29</td>
                          <td>¿Ha estado en riñas o lo han detenido estando borracho?</td>
                              @if($srq->p_xxix=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                        </tr>
                        <tr>
                          <td align="center">30</td>
                          <td>¿Le ha parecido alguna vez que usted bebía demasiado?</td>
                              @if($srq->p_xxx=='1')
                              <td align="center">X</td>
                              <td></td>
                              @else
                              <td></td>
                              <td align="center">X</td>
                              @endif
                          </td>
                        </tr>
      </tbody>
    </table>
    </div><br><br>

    <h3 style="margin-bottom: 0px;"><b>Observaciones:</b></h3>
    @if($srq->obs!='')
      <p>{{$srq->obs}}</p>
    @else
      <p>@for($i=0;$i<=2;$i++)________________________________________________________________________________ <br><br> 
       @endfor</p>
    @endif

    <h3 style="margin-bottom: 0px;"><b>Conclusiones:</b></h3>
    @if($srq->conclusiones!='')
      <p>{{$srq->conclusiones}}</p>
    @else
      <p>@for($i=0;$i<=2;$i++)________________________________________________________________________________ <br><br> 
       @endfor</p>
    @endif
    <br><br>
    <div align="right">
      <p>Pillco Marca, {{$srq->created_at->format('d/m/Y')}}</p>
    </div>
  </div>
  </body>
</html>