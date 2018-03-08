    <style>
      
      /*Tablas*/
      .tth{font-size:16px;background:#e8edff; padding:2px;}
      .ttd{font-size:14px;padding: 2px; padding-left: 10px;}
      
      p{
        margin:5px;
        margin-left: 15px;
      }
      .mi-ul{
      	float:left; margin-right: 50px; 
      }


    </style>
<h2>
	<a href="{{url('pdf/odontologiatodo',$user->id)}}">
    	<i class="menu-icon fa fa-download"></i><span class="menu-text"> Descargar Todo</span>
    </a>
</h2>
@foreach($odontologias as $odo)
	<div style="background-color: rgba(31,117,255,0.1); border-radius: 1em; border:1.5px solid;border-color:#4682B4; padding: 1em;">
    	<p><b>
    		<i class="menu-icon fa fa-asterisk"></i><span class="menu-text"> Cód: </span>
    		{{$odo->id}} &nbsp;&nbsp;&nbsp;&nbsp;
    		<i class="menu-icon fa fa-calendar"></i><span class="menu-text"> Fecha: </span>
    		{{Carbon\Carbon::parse($odo->created_at)->format('d/m/Y')}} &nbsp;&nbsp;&nbsp;&nbsp;
    		<i class="menu-icon fa fa-user-md"></i><span class="menu-text"> Odontologo(a): </span>
    		{{$odo->odontologo->nombres.' '.$odo->odontologo->apellido_paterno.' '.$odo->odontologo->apellido_materno}}
    		 &nbsp;&nbsp;&nbsp;&nbsp;
    		<a href="{{url('pdf/odontologia',$odo->id)}}" target="_blank">
    		<i class="menu-icon fa fa-download"></i><span class="menu-text"> Descargar </span>
    		</a>
    		</b>
    	</p><br>
    	
    	<p><b>I. Motivo de consulta: </b></p>
    	<p>{{$odo->i_motivo_consulta}}</p><br>

    	<p><b>II. Estado de salud General: </b></p>
    	<ul>
    		<li>Presenta alguna enfermedad sistemica actualmente: @if($odo->ii_a=='1')SI @else NO @endif</li>
			<li>Presenta alguna enfermedad sistemica anteriormente: @if($odo->ii_b=='1')SI @else NO @endif</li>
			<li>Alergico a algún medicamento o sustencia: @if($odo->ii_b=='1')SI @else NO @endif</li>
			<li>Antecedentes de operaciones: @if($odo->ii_c=='1')SI @else NO @endif</li>
    	</ul><br>

    	<p><b>III. Estado de salud Bucodental :</b></p>
    	<p>a) Examen Odontológico: </p>
    	   <div class="clearfix" align="center">
				<img src="{{URL::to('imagenes/odontograma.png')}}">
			</div>
		<div class="clearfix" align="center">
								<label>
									<input name="iii_xviii" class="ace" type="checkbox" value="1"
										@if($odo->iii_xviii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">18 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xvii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xvii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">17 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xvi" value="1" class="ace" type="checkbox"
										@if($odo->iii_xvi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">16 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xv" value="1" class="ace" type="checkbox"
										@if($odo->iii_xv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">15 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xiv" value="1" class="ace" type="checkbox"
										@if($odo->iii_xiv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">14 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xiii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xiii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">13 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">12 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xi" value="1" class="ace" type="checkbox"
										@if($odo->iii_xi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">11&nbsp;&nbsp;-&nbsp;&nbsp;</span>
								</label>
								<label>
									<input name="iii_xxi" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">21 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxii=='1')
                						checked="checked"
              						@endif/>
									<span class="lbl">22 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxiii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxiii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">23 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxiv" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxiv=='1')
                						checked="checked"
              						@endif 
              					/>
									<span class="lbl">24 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxv" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">25 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxvi" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxvi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">26 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxvii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxvii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">27 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxviii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxviii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">28 </span> &nbsp;
								</label><br>

								<label>
									<input name="iii_lv" value="1" class="ace" type="checkbox"
										@if($odo->iii_lv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">55 </span> &nbsp;
								</label>
								<label>
									<input name="iii_liv" value="1" class="ace" type="checkbox"
										@if($odo->iii_xliv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">54 </span> &nbsp;
								</label>
								<label>
									<input name="iii_liii" value="1" class="ace" type="checkbox"
										@if($odo->iii_liii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">53 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lii" value="1" class="ace" type="checkbox"
										@if($odo->iii_lii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">52 </span> &nbsp;
								</label>
								<label>
									<input name="iii_li" value="1" class="ace" type="checkbox"
										@if($odo->iii_li=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">51&nbsp;&nbsp;-&nbsp;&nbsp;</span>
								</label>
								<label>
									<input name="iii_lxi" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">61 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxii" value="1" class="ace" type="checkbox"				
										@if($odo->iii_lxii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">62 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxiii" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxiii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">63 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxiv" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxiv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">64 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxv" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">65 </span> &nbsp;
								</label><br>

								<label>
									<input name="iii_lxxxv" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxxxv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">85 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxxiv" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxxxiv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">84 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxxiii" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxxxiii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">83 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxxii" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxxxii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">82 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxxi" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxxxi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">81&nbsp;&nbsp;-&nbsp;&nbsp;</span>
								</label>
								<label>
									<input name="iii_lxxi" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxxi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">71 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxii" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxxii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">72 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxiii" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxxiii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">73 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxiv" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxxiv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">74 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxv" value="1" class="ace" type="checkbox"
										@if($odo->iii_lxxv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">75 </span> &nbsp;
								</label><br>

								<label>
									<input name="iii_xlviii" class="ace" type="checkbox" value="1"
										@if($odo->iii_xlviii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">48 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xlvii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xlvii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">47 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xlvi" value="1" class="ace" type="checkbox"
										@if($odo->iii_xlvi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">46 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xlv" value="1" class="ace" type="checkbox"
										@if($odo->iii_xlv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">45 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xliv" value="1" class="ace" type="checkbox"
										@if($odo->iii_xliv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">44 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xliii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xliii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">43 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xlii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xlii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">42 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xli" value="1" class="ace" type="checkbox"
										@if($odo->iii_xli=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">41&nbsp;&nbsp;-&nbsp;&nbsp;</span>
								</label>
								<label>
									<input name="iii_xxxi" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxxi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">31 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxxii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">32 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxiii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxxiii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">33 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxiv" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxxiv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">34 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxv" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxxv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">35 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxvi" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxxvi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">36 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxvii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxxvii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">37 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxviii" value="1" class="ace" type="checkbox"
										@if($odo->iii_xxxviii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">38 </span> &nbsp;
								</label><br>
		</div>
		<p>b) Examen Bucal: (con patologías en...)</p>
		<ul>
    		<li>Encias: @if($odo->iii_b_a=='1')SI @else NO @endif</li>
			<li>ATM: @if($odo->iii_b_b=='1')SI @else NO @endif</li>
			<li>Mucosas: @if($odo->iii_b_c=='1')SI @else NO @endif</li>
			<li>Labios: @if($odo->iii_b_d=='1')SI @else NO @endif</li>
			<li>Lengua: @if($odo->iii_b_e=='1')SI @else NO @endif</li>
			<li>Otros: @if($odo->iii_b_f=='1') {{$odo->iii_b_otros}} @else NO @endif</li>
    	</ul><br>

    	<p><b>IV. Diagnóstico:</b></p>
		<p>{{$odo->iv_diagnostico}}</p><br>

		<p><b>V. Plan de tratamiento :</b></p>
		<?php 
			$procedimientos = App\CmOdoProc::where('odontologia_id',$odo->id)->get();
		?>
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

    <p><b>VI. Medicamentos :</b></p>
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

    <p><b>VII. Atenciones :</b></p>
		<?php 
			$atenciones = App\CmOdoAtencion::where('odontologia_id',$odo->id)->get();
		?>
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

  	</div><br>

@endforeach