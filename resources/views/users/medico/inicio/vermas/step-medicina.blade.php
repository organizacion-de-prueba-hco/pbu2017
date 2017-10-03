
<h2>
	<a href="{{url('pdf/medicinatodo',$estudiante->user_id)}}">
    	<i class="menu-icon fa fa-download"></i><span class="menu-text"> Descargar Todo</span>
    </a>
</h2>
@foreach($medicinas as $med)
	<div style="background-color: rgba(31,117,255,0.1); border-radius: 1em; border:1.5px solid;border-color:#4682B4; padding: 1em;">
    	<p><b>
    		<i class="menu-icon fa fa-asterisk"></i><span class="menu-text"> Cód: </span>
    		{{$med->id}} &nbsp;&nbsp;&nbsp;&nbsp;
    		<i class="menu-icon fa fa-calendar"></i><span class="menu-text"> Fecha: </span>
    		{{Carbon\Carbon::parse($med->created_at)->format('d/m/Y')}} &nbsp;&nbsp;&nbsp;&nbsp;
    		<i class="menu-icon fa fa-user-md"></i><span class="menu-text"> Médico: </span>
    		{{$med->medico->nombres.' '.$med->medico->apellido_paterno.' '.$med->medico->apellido_materno}}
    		 &nbsp;&nbsp;&nbsp;&nbsp;
    		<a href="{{url('pdf/medicina',$med->id)}}" target="_blank">
    		<i class="menu-icon fa fa-download"></i><span class="menu-text"> Descargar </span>
    		</a>
    		</b>
    	</p><br>
    	<h3>EXAMEN FÍSICO</h3><br>
    	<ul>
    		<li class="mi-ul"><b>TE: </b>{{$med->te}}</li>
			<li class="mi-ul"><b>FI: </b>{{$med->fi}}</li>
			<li class="mi-ul"><b>CE: </b>{{$med->ce}}</li>
    	</ul><br>
    	
    	<p><b>RELATO DE ENFERMEDAD</b></p>
    	<p>{{$med->relato_enf}}</p>
    	<ul>
    		<li class="mi-ul"><b>FC: </b>{{$med->triaje_fc}} x'</li>
			<li class="mi-ul"><b>FR: </b>{{$med->triaje_fr}} x'</li>
			<li class="mi-ul"><b>T°: </b>{{$med->triaje_to}} C°</li>
			<li class="mi-ul"><b>P/A: </b>{{$med->triaje_pa}} mmHg</li>
			<li class="mi-ul"><b>P: </b>{{$med->triaje_p}} Kg</li>
			<li class="mi-ul"><b>T: </b>{{$med->triaje_t}} cm</li>
			<li class="mi-ul"><b>IMC: </b>{{$med->triaje_imc}} Kg/m2sc</li>
    	</ul><br>
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
	          <td class="ttd center">{{$mp->cantidad}}</td>
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
          	<th class="ttd center">Cantidad</th>
				<th class="ttd center">Nombre</th>
				<th class="ttd center">Presentación</th>
				<th class="ttd center">Indicaciones</th>
        	</tr>
      	</thead>
      	<tbody>
	      @foreach($mms as $m)
	        <tr style="border: 1px solid black;">
	        		<td class="center">{{$m->cantidad}}</td>
					<td class="center">{{$m->medicamento->medicamento}}</td>
					<td class="center">{{$m->medicamento->presentacion}}</td>
					<td class="ttd"> {{$m->indicaciones}}</td>
	        </tr>
	      @endforeach
      	</tbody>
    </table><br>
    @if($med->cita != '0000-00-00')
    	<p><b>PRÓXIMA CITA: </b>{{$med->cita}}</p>
    @endif
		

  	</div><br>

@endforeach