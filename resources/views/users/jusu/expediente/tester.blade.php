@extends('master.jusu')
@section('activacion')
	<?php
$oa = 'active';
$a  = '';
$b  = '';
$c  = '';
$c1 = '';
$c2 = '';
$c3 = '';
$c4 = '';
$d  = '';
$d1 = '';
$d2 = '';
$d3 = '';
$d4 = '';
$e  = '';
?>
@endsection
@section('titulo','Tester')
@section('estilos')
	<style type="text/css">
		label{
			font-size: 14px;
			color: blue;
			font-weight: bold;
		}
		p{
			font-size: 15px;
		}
	</style>
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-list-alt"></i>
	<li class="active">Tester</li>
</ul>
@endsection
@section('contenido')
@if($estudiante)
<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->


								<div class="hr dotted"></div>

								<div>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<img id="avatar" alt="Alex's Avatar" src="{{URL::to('imagenes/avatar/'.$estudiante->user->foto)}}">
												</span>

												<div class="space-4"></div>

												<div style="background-color:#6600ff; border-radius: 5px;">
													<div class="inline position-relative">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white">{{$estudiante->user->nombres}}<br>{{$estudiante->user->apellido_paterno.' '.$estudiante->user->apellido_materno}}</span>
													</div>
												</div>
											</div>

											<div class="space-6"></div>

											<div class="profile-contact-info">
												<div class="profile-contact-links align-left">
													<p><label><i class="ace-icon fa fa-hand-o-right">	</i> Facultad: </label>
														{{$estudiante->escuela->facultad->facultad}}
													</p>
													<p><label><i class="ace-icon fa fa-hand-o-right">	</i> Escuela: </label>
														{{$estudiante->escuela->escuela}}
													</p>
													<p><label><i class="ace-icon fa fa-hand-o-right">	</i> Año de Estudio: </label>
														{{$estudiante->anio_estudio}}
													</p>


												</div>

											</div>


										</div>

										<div class="col-xs-12 col-sm-9">
											<?php
$notas  = App\Notas::where('cod_univ', $estudiante->cod_univ)->get();
$cont   = 0;
$lanota = 0;
foreach ($notas as $key => $nota) {
    $cont++;
    $lanota = $lanota + $nota->nota;
}
if ($cont == 0) {
    $cont = 1;
}
$promedionotas = round($lanota / $cont, 2);
switch ($estudiante->m_ingreso_id) {
    case '2':case '5':case '18':
        $estadoa         = 'succes';
    default:$estadoa = '';
        break;
}
if ($promedionotas <= 10.5) {
    $estadob = 'danger';
} else if ($promedionotas > 10.5 && $promedionotas < 13.5) {
    $estadob = 'warning';
} else if ($promedionotas >= 13.5 && $promedionotas <= 20) {
    $estadob = 'success';
} else {
    $estadob = '';
}

?>
											<div class="center">
											<table class="table table-bordered">
												<thead>
													<td>
													 Modalidad de Ingreso
													</td>
													<td>
													 Promedio ponderado (último año cursado)
													</td>
												</thead>
												<tbody>
													<tr>
														<td class="{{$estadoa}}">{{$estudiante->m_ingreso->modalidad}}</td>
														<td class="{{$estadob}}">{{$promedionotas}}</td>
													</tr>
												</tbody>
											</table><br>

											<table class="table table-bordered">
												<thead>
													<td>
														Curso
													</td>
													<td>
														Nota
													</td>
													<td>
														Semestre
													</td>
													<td>
														Modalidad
													</td>
												</thead>
												<tbody>
													@foreach($notas as $nota)
													<tr>
														<td>{{$nota->curso}}</td>
														<td>{{$nota->nota}}</td>
														<td>{{$nota->semestre}}</td>
														<td>{{$nota->modalidad}}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
											</div>

											<div class="space-12"></div>
											<label><b>&nbsp;&nbsp;Más Información</b></label>
											<div</ class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Código Universitario </div>

													<div class="profile-info-value">
														<span id="username">{{$estudiante->cod_univ}}</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> DNI </div>
													<div class="profile-info-value">
														<span id="country">{{$estudiante->user->dni}}</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Ap. Paterno </div>
													<div class="profile-info-value">
														<span id="country">{{$estudiante->user->apellido_paterno}}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Ap. Materno </div>
													<div class="profile-info-value">
														<span id="country">{{$estudiante->user->apellido_materno}}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Nombres </div>
													<div class="profile-info-value">
														<span id="country">{{$estudiante->user->nombres}}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Género </div>
													<div class="profile-info-value">
														<span id="country">
															@if($estudiante->user->genero=='1')
																Masculino
															@elseif($estudiante->user->genero=='0')
																Femenino
															@endif
														</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Modalidad de Ingreso </div>
													<div class="profile-info-value">
														<span >{{$estudiante->m_ingreso->modalidad}}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Colegio (año) </div>
													<div class="profile-info-value">
														<span >{{$estudiante->colegio->v_colegio.' ('.$estudiante->colegio->v_fecha.')'}}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Dirección del Colegio</div>
													<div class="profile-info-value">
														<span >{{$estudiante->colegio->v_distrit->distrito.' - '.$estudiante->colegio->v_distrit->provincia->provincia.' - '.$estudiante->colegio->v_distrit->provincia->departamento->departamento}}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Lugar de Nacimiento</div>
													<div class="profile-info-value">
														<span >{{$estudiante->user->distrito_naci->distrito.' - '.$estudiante->user->distrito_naci->provincia->provincia.' - '.$estudiante->user->distrito_naci->provincia->departamento->departamento}}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Domicilio actual</div>
													<div class="profile-info-value">
														<span >{{$estudiante->user->domicilio.' '.$estudiante->user->n_domicilio}}</span>
													</div>
												</div>


											</div>




									</div>
								</div>




								<!-- PAGE CONTENT ENDS -->
							</div>
<!--bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb-->
<div class="space-12"></div>
@else
	<h3>¡Error! <span> El Código ingresado no existe</span></h3><a href="{{url('jusuexpediente')}}">volver</a>
@endif
@endsection