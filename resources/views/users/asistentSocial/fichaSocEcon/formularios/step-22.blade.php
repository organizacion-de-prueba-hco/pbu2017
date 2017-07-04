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
                            <br><br>
                            <!-- end user projects -->
</div>