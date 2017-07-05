<div>
  <h2 class="StepTitle">III. SITUACIÓN ECONÓMICA FAMILIAR</h2><hr>
    <!-- start user projects -->
      <h2 class="StepTitle">3.1. Ingreso mensual</h2><br>
       <!-- start user projects -->
         <div class="table-responsive">
            <a onclick="resetearModalIfamiliar('fichasocial/modalifamiliar','nuevo-ifamiliar','#NuevoIfamiliar');" data-toggle="modal" data-target="#NuevoIfamiliar" class="btn btn-success btn-xs" >Agregar</a>
             <table class="data table table-hover no-margin">
               <thead>
                  <tr>
                     <th>Pariente</th>
                     <th>Sueldo o salario</th>
                     <th>Honorario profesionales</th>
                     <th>Pensión por viudez</th>
                     <th>Empresa o negocio</th>
                     <th>SUB TOTAL</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $itotal=0; ?>
                  @foreach($cfamiliares as $if)
                  <?php $subtotal=$if->sueldo+$if->honorario+$if->pension+$if->empresa; ?>
                  <tr onclick="cargarModalIfamiliar('{{$if->id}}');" data-toggle="modal" data-target="#EditarIfamiliar">
                     <td><b>{{$if->parentesco}}</b> ({{$if->nombres}})</td>
                     <td>{{$if->sueldo}}</td>
                     <td>{{$if->honorario}}</td>
                     <td>{{$if->pension}}</td>
                     <td>{{$if->empresa}}</td>
                     <td>{{$subtotal}}</td>
                  </tr>
                                <?php $itotal=$itotal+$subtotal;?>
                              @endforeach()
               </tbody>
            </table>
            <p style="color: black;">Total: S/ {{$itotal}} </p>
                            </div><hr>
  <h3 class="lighter block green">2.1. Relaciones Familiares </h3>

  {!! Form::open(['method'=>'post','id'=>'elformulario2-1-rf','class'=>'form-horizontal form-label-left']) !!}
  
                  <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Familia:</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::select('tipo_familia',$TipoFamilias,$user->estudiante->tipo_familia,['required','id'=>'e_departamento', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Seleccione'])!!}
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Religión:</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::select('trato_padres',$TratoPadres,$user->estudiante->trato_padres,['required','id'=>'e_departamento', 'class'=>'col-xs-12 col-sm-6'])!!}
                      </div>
                    </div>
                  </div>

                  <div class="hr hr-dotted"></div>
                  <div align="center" ><br>
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input type="submit" value="Actualizar" class="btn btn-info" onclick="lafuncion('/fichasocial/relacionesfamiliares','#elformulario2-1-rf','#step-22')"><br><br></div>

                  <div class="space-2"></div>
                {!! Form::close() !!}
</div>