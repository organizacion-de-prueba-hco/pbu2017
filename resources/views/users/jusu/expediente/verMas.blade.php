@extends('master.jusu')
@section('activacion')
	<?php
$oa = 'active';
$nbecas='';
$enc='';
$in='';
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
	<li class="active">Expedientes</li>
	<li class="active">Ver más</li>
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
												@if($estudiante->user->expediente->estado=='1')
												<span class="label label-sm label-success">	Aprobado
												</span>
												@elseif($estudiante->user->expediente->estado=='0')
												<span class="label label-sm label-warning">	Desaprobado
												</span>
												@endif
												<br>
												<span class="profile-picture">
													<img id="avatar" alt="Alex's Avatar" src="{{URL::to('imagenes/avatar/'.$estudiante->user->foto)}}">
												</span>

												<div class="space-4"></div>

												<div style="background-color:#6600ff; border-radius: 10px 10px 0 0;">
													<div class="inline position-relative">
														<span class="white">{{$estudiante->user->nombres}}<br>{{$estudiante->user->apellido_paterno.' '.$estudiante->user->apellido_materno}}<br>({{$estudiante->cod_univ}})</span>
													</div>
												</div>
											</div>

											<div class="space-6"></div>

											<div class="profile-contact-info">
												<div class="profile-contact-links align-left">
													
													<p><label><i class="ace-icon fa fa-hand-o-right">	</i> Tipo de Beca: </label>
														{{$estudiante->user->expediente->tipo_beca}}
													</p>
													<p><label><i class="ace-icon fa fa-hand-o-right">	</i> Facultad: </label>
														{{$estudiante->escuela->facultad->facultad}}
													</p>
													<p><label><i class="ace-icon fa fa-hand-o-right">	</i> Escuela: </label>
														{{$estudiante->escuela->escuela}}
													</p>
													<p><label><i class="ace-icon fa fa-hand-o-right">	</i> Año de Estudio: </label>
														{{$estudiante->anio_estudio}}
													</p>
													@if($estudiante->user->expediente->obs)
													<p><label><i class="ace-icon fa fa-hand-o-right">	</i> Observaciones: </label>
														{{$estudiante->user->expediente->obs}}
													</p>
													@endif
												</div>
											</div>
											<div class="space-6"></div>

											<div class="profile-contact-info">
												<div class="profile-contact-links align-left"  style="border-radius: 0 0 10px 10px;">
													<p><label>
														<a href="{{url('pdf/fs',$estudiante->user_id)}}" target="_black" title="Ver más">&nbsp;
															<i class="ace-icon fa fa-search-plus"></i> &nbsp;Ficha Socio Económica
														</a>
														 </label>
													</p>
													<p><label>
														<a href="{{url('pdf/dj',$estudiante->user_id)}}" target="_black" title="Ver más">&nbsp;
															<i class="ace-icon fa fa-search-plus"></i> &nbsp;Declaración Jurada del Apoderado
														</a>
														 </label>
													</p>
													<p><label>
														<a href="#" title="Ver más">&nbsp;
															<i class="ace-icon fa fa-search-plus"></i> &nbsp;Visita Domiciliaria
														</a>
														 </label>
													</p>
													<p><label>
														<a href="#" title="Ver más">&nbsp;
															<i class="ace-icon fa fa-search-plus"></i> &nbsp;Visita Hospitalaria
														</a>
														 </label>
													</p>								
													
												</div>
											</div>

										</div>

										<div class="col-xs-12 col-sm-9">
										<div class="space-6"></div>
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


<!--Modal testear-->
		<div id="detalleNotas" class="modal fade" tabindex="-1">
								<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin">Detalles de Notas</h3>
											</div>

											<div class="modal-body" align="center" >
												<table class="table table-bordered" style="background-color: white">
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
													<br>
											</div>

											<!-- <div class="modal-footer">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>
											</div> -->
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
		</div>
<!--Fin modal Testear-->
											<div class="center">
											<table class="table table-bordered">
												<thead>
													<tr>
														<td colspan="3">Recibo</td>
														<td rowspan="2" style="vertical-align: middle;">
															Promedio ponderado <br>(último año cursado)
														</td>
													</tr>
													<tr>
														<td>Número</td>
														<td>Fecha</td>
														<td>Monto</td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#######</td>
														<td>2017</td>
														<td>50.8</td>
														<td class="{{$estadob}}" href="#detalleNotas" data-toggle="modal" title="Clic para más detalles">{{$promedionotas}}</td>
													</tr>
												</tbody>
											</table><br>

											
											</div>

											<div class="space-12"></div>
											
											<label><b>Historial</b></label>
											@if($hexpedientes!='[]')
											<table class="table table-bordered">
												<thead align="center">
													<td>
														Fecha
													</td>
													<td>
														Tipo Beca
													</td>
													<td>
														Resultado
													</td>
													<td>
														Obs
													</td>
												<tbody align="center">
													@foreach($hexpedientes as $he)
													<tr>
														<td>{{$he->created_at}}</td>
														<td>{{$he->tipo_beca}}</td>
														<td >
														@if($he->resultado=='1')
															<span class="label label-sm label-success">	Aprobado
															</span>
														@elseif($he->resultado=='0')
															<span class="label label-sm label-warning">	Desaprobado
															</span>
														@endif
														</td>
														<td align="left">{{$he->obs}}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
											@else
												<p><i> Aún no se han registrado expedientes para el estudiante</i></p>
											@endif

											<div class="space-12"></div>
											<label><b>&nbsp;&nbsp;Más Información</b></label>
											<div class="profile-user-info profile-user-info-striped">
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
													<div class="profile-info-name"> Fecha de Nacimiento</div>
													<div class="profile-info-value">
														<span >{{$estudiante->user->f_nac}}</span>
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
											<br><br><br><br><br><br>
									</div>
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div>
<!--bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb-->

@else
	<h3>¡Error! <span> El Código ingresado no existe</span></h3><a href="{{url('jusuexpediente')}}">volver</a>
@endif
@endsection
