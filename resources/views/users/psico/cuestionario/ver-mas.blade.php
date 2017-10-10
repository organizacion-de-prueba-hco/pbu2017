@extends('master.psico')
@section('activacion')
<?php  
		$i ='';
		$ii='';
		$iii='active';
		$iv='';
	?>
@endsection
@section('titulo','Actualizar Cuestionario')
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
	<i class="ace-icon fa fa-list"></i>
	<li class="active">Cuestionario</li>
	<li class="active">Actualizar</li>
</ul>
@endsection
@section('contenido')
@if($estudiante)
<div class="hr dotted"></div>

<?php
    $estadoBoton = '';
    $mensajeCabecera='';

?>

<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<h3 style="color: red; margin-left: 10em; padding-bottom: 5px;">{{$mensajeCabecera}}</h3>
								{!! Form::open(['route' => ['psicosqr.update',$srq->id],  'method' => 'PUT', 'class'=>'form-horizontal']) !!}
								<div class="col-md-offset-9 col-sm-offset-9">
								<label><span style="background-color:yellow; padding: 3px;">PSIC - {{$srq->id}} </span></label>
								</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> DNI </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Código Universitario" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->user->dni}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Código Universitario </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Código Universitario" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->cod_univ}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nombres </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->user->nombres}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Apellidos </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->user->apellido_paterno.' '.$estudiante->user->apellido_materno}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Sexo </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" @if($estudiante->user->genero=='1') value="MASCULINO" @else value="FEMENINO" @endif >
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Facultad </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->escuela->facultad->facultad}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Escuela </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->escuela->escuela}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Modalidad de Ingreso </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Código Universitario" class="col-xs-10 col-sm-5" disabled="true" value="{{$estudiante->m_ingreso->modalidad}}">
										</div>
									</div>

									
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Domicilio Actual:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('domicilio', $estudiante->user->domicilio, ['class'=> 'col-xs-10 col-sm-5', 'placeholder'=>'Nombre de la calle, Av. Jr, etc'])!!}
											</div>
											<div class="clearfix">
												{!!Form::text('n_domicilio', $estudiante->user->n_domicilio, ['required','class'=> 'col-xs-10 col-sm-5', 'placeholder'=>'Número, Lt., Mz., etc','style'=>'margin-top: 2px;'])!!}
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Telf./Cel. </label>
										<div class="col-sm-9">
											<input name="telefono" type="text" placeholder="N° Telf./Cel" class="col-xs-10 col-sm-5" value="{{$estudiante->user->telefono}}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Fecha Nacimiento </label>
										<div class="col-sm-9">
										<input type="date" name="f_nac" value="{{$estudiante->user->f_nac}}">
										</div>
									</div>
									<hr>
									<h3 align="center">CUESTIONARIO DE SÍNTOMAS S.R.Q.</h3>
									<br>
									<div class="form-group">
							
										<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8  col-xs-12">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>N°</th>
													<th class="center">Pregunta</th>
													<th class="center">Respuesta<br>YES ( si ) - NO</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>01</td>
													<td>¿Tiene frecuentes dolores de cabeza?</td>
													<td class="center"><label>
														<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_i=='1') checked="true" @endif>
														<span class="lbl middle"></span>
														</label>
													</td>
												</tr>
												<tr>
													<td>02</td>
													<td>¿Tiene mal apetito?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"   
														@if($srq->p_ii=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>03</td>
													<td>¿Duerme mal?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_iii=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>04</td>
													<td>¿Se asusta con facilidad?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_iv=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>05</td>
													<td>¿Sufre de temblor de manos?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_v=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>06</td>
													<td>¿Se siente nervioso o tenso?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_vi=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>07</td>
													<td>¿Sufre de mala digestión?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_vii=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>08</td>
													<td>¿Tiene dificultades para  pensar con claridad?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_viii=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>09</td>
													<td>¿Se siente triste?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_ix=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>10</td>
													<td>¿Llora usted con mucha frecuencia?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_x=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>11</td>
													<td>¿Tiene dificultad en disfrutar sus actividades diarias?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xi=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>12</td>
													<td>¿Tiene dificultad para tomar decisiones?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xii=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>13</td>
													<td>¿Tiene dificultad en hacer su trabajo y/o Estudios? <br>(¿sufre usted con su trabajo y/o estudios?)</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xiii=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>14</td>
													<td>¿Es incapaz de desempeñar un papel útil en su vida?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xiv=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>15</td>
													<td>¿Ha perdido interés en las cosas que usualmente hacía?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xv=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>16</td>
													<td>¿Siente que usted es una persona inútil?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xvi=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>17</td>
													<td>¿Ha tenido la idea de acabar con su vida?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xvii=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>18</td>
													<td>¿Se siente cansado todo el tiempo?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xviii=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>19</td>
													<td>¿Tiene sensaciones desagradables en su estómago?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xix=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>20</td>
													<td>¿Se cansa con facilidad?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xx=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>21</td>
													<td>¿Siente usted que alguien ha tratado de herirlo en alguna forma? <br>Ejm: pensar que alguien conspira contra usted, que alguien intenta dañarle, etc.</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xxi=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>22</td>
													<td>¿Usted se considera una persona mucho más importante que los demás?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xxii=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>23</td>
													<td>¿Ha notado interferencias o algo raro en su pensamiento? <br>Ejm. Oír voces, ver cosas que otras personas no pueden ver ni oír, etc.</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xxiii=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>24</td>
													<td>¿Oye voces sin saber de dónde vienen o que otras personas no pueden oír?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xxiv=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>25</td>
													<td>¿Ha tenido convulsiones, ataques o caídas al suelo, con movimientos de brazos y piernas;<br> con mordedura de la lengua o pérdida del conocimiento?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xxv=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>26</td>
													<td>¿Alguna vez le ha parecido a su familia, sus amigos, su médico o a su sacerdote<br> que usted estaba bebiendo demasiado licor?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xxvi=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>27</td>
													<td>¿Alguna vez ha querido dejar de beber, pero no ha podido?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xxvii=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>28</td>
													<td>¿Ha tenido alguna vez dificultades en el trabajo (o estudio) a causa de la bebida,<br> como beber en el trabajo o en el colegio, o faltar a ellos?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xxviii=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>29</td>
													<td>¿Ha estado en riñas o lo han detenido estando borracho?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xxix=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
												<tr>
													<td>30</td>
													<td>¿Le ha parecido alguna vez que usted bebía demasiado?</td>
													<td class="center"><label>
													<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5" value="1"  
														@if($srq->p_xxx=='1') checked="true" @endif>
													<span class="lbl middle"></span>
													</label>
													</td>
												</tr>
											</tbody>
										</table>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Observaciones </label>
										<div class="col-sm-9">
											<textarea  placeholder="Describir aquí..." class="col-sm-9"  name="obs" required="true">{{$srq->obs}}</textarea>
											
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Conclusiones </label>
										<div class="col-sm-9">
											<textarea  placeholder="Describir aquí..." class="col-sm-9"  name="conclusiones" required="true">{{$srq->conclusiones}}</textarea>
											
										</div>
									</div>
									<br>
									<div class="form-group" >
										<div class="col-sm-6">
											<input type='hidden' value="{{$estudiante->user_id}}" name="estudiante_id">
											<button type="submit" class="width-35 pull-right btn btn-sm btn-primary col-xs-10 col-sm-5" {{$estadoBoton}}>
											<i class="ace-icon fa fa-plus" ></i>
											<span class="bigger-110">Actualizar</span>
											</button>
										</div>
									</div>
			                    {!! Form::close() !!}


								</div><!-- PAGE CONTENT ENDS -->

@else
	<h3>¡Error! <span> El Código ingresado no existe</span></h3><a href="{{url('psicosqr')}}">volver</a>
@endif


@endsection