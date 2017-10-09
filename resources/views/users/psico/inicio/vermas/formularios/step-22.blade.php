<div>
	
                        <h2 class="StepTitle">II. CUADRO FAMILIAR</h2>
                        <hr>
                        <!-- start user projects -->
                            <div class="table-responsive">
                            <a href="#" data-toggle="modal" data-target="#NuevoCfamiliar" class="btn btn-success btn-xs">Agregar</a>
                            <table class="data table table-hover no-margin">
                              <thead>
                                <tr>
                                  <th>Nombres y Apellidos</th>
                                  <th>Parentesco</th>
                                  <th>Fecha de Nacimiento (edad)</th>
                                  <th>N° DNI</th>
                                  <th>Grado de instrucción</th>
                                  <th>Ocupación</th>
                                  <th>Lugar de Residencia</th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($cfamiliares as $cfamiliar)
                              <?php if($cfamiliar->parentesco=='YO') continue; ?>
                                <tr data-toggle="modal" data-target="#EditarCfamiliar" onclick="cargarModalCfamiliar('{{$cfamiliar->id}}')">
                                  <td>{{$cfamiliar->nombres}}</td>
                                  <td>{{$cfamiliar->parentesco}}</td>
                                  <td>{{$cfamiliar->f_nac}} (<b>
                                  	<?php 
                  										$fn= Carbon\Carbon::parse($cfamiliar->f_nac);
                  										echo Carbon\Carbon::createFromDate(
                  											$fn->format('Y'),
                  											$fn->format('m'),
                  											$fn->format('d')
                  										)->age;
                  									?> </b>)
                                  </td>
                                  <td>{{$cfamiliar->dni}}</td>
                                  <td>{{$instruccion[$cfamiliar->grado_instrucion]}}</td>
                                  <td>{{$cfamiliar->ocupacion}}</td>
                                  <td>{{$cfamiliar->residencia}}</td>
                                </tr>
                              @endforeach
                              </tbody>
                            </table>
                            </div><hr>
  <h3 class="lighter block green">2.1. Relaciones Familiares </h3>

  {!! Form::open(['method'=>'post','id'=>'elformulario2-1-rf','class'=>'form-horizontal form-label-left']) !!}
                  <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Familia:</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::select('tipo_familia',$TipoFamilias,$user->estudiante->tipo_familia,['required', 'class'=>'col-xs-12 col-sm-6'])!!}
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Trato con los padres:</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::select('trato_padres',$TratoPadres,$user->estudiante->trato_padres,['required','class'=>'col-xs-12 col-sm-6'])!!}
                      </div>
                    </div>
                  </div>

                  <div class="hr hr-dotted"></div>
                  <div align="center" ><br>
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input type="submit" value="Actualizar" class="btn btn-info" onclick="lafuncion('/psicoinicios/relacionesfamiliares','#elformulario2-1-rf','#step-22');""><br><br></div>

                  <div class="space-2"></div>
{!! Form::close() !!}
</div>