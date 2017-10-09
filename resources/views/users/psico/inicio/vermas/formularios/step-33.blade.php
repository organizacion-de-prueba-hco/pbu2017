<div>
  <h2 class="StepTitle">III. SITUACIÓN ECONÓMICA FAMILIAR</h2><hr>
    <!-- start user projects -->
      <h3 class="lighter block green">3.1. Ingreso mensual</h3><br>
       <!-- start user projects -->
         <div class="table-responsive">
           
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
                     <td align="center">{{$if->sueldo}}</td>
                     <td align="center">{{$if->honorario}}</td>
                     <td align="center">{{$if->pension}}</td>
                     <td align="center">{{$if->empresa}}</td>
                     <td align="center">{{$subtotal}}</td>
                  </tr>
                     <?php $itotal=$itotal+$subtotal;?>
                  @endforeach()
               </tbody>
            </table>
            
         </div>
         <div align="right">=> 
           <span style="background-color: yellow; padding: 4px;"><b>Total: S/ {{$itotal}} </b></span>
        </div>
  <hr>
  <h3 class="lighter block green">3.2. Lugar de trabajo</h3><br>
       <!-- start user projects -->
         <div class="table-responsive">
           
             <table class="data table table-hover no-margin">
               <thead>
                  <tr>
                     <th>Pariente</th>
                     <th>Lugar de trabajo</th>
                     <th>Fecha de Inicio</th>
                     <th>Fecha de término</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($cfamiliares as $if)
                  <?php $subtotal=$if->sueldo+$if->honorario+$if->pension+$if->empresa; 
                    if ($subtotal==0) {
                      continue;
                    }
                  ?>
                  <tr onclick="cargarModaLtrabajosf('{{$if->id}}');" data-toggle="modal" data-target="#Ltrabajosf">
                     <td><b>{{$if->parentesco}}</b> ({{$if->nombres}})</td>
                     <td>{{$if->lugar_trabajo}}</td>
                     <td>{{$if->trabajo_inicio}}</td>
                     <td>{{$if->trabajo_fin}}</td>
                  </tr>
                  @endforeach()
               </tbody>
            </table>
         </div>
  <hr>
  {!! Form::open(['method'=>'post','id'=>'elformulario3-gastosyotrosdatos','class'=>'form-horizontal form-label-left']) !!}
   <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
 <h3 class="lighter block green">3.3 Quién cubre sus Gastos personales </h3>
    <div class="form-group">
      <label class="control-label col-xs-12 col-sm-3 no-padding-right">Seleccione una opción</label>
      <div class="col-xs-12 col-sm-9">
        <div class="clearfix">
          {!!Form::select('cubre_gastos',$cubreGastos,$user->estudiante->cubre_gastos,['required', 'id'=>'cubre_gastos', 'onchange'=>'desc_cubre_gasto(this.value);', 'class'=>'col-xs-12 col-sm-6'])!!}
        </div><br>
        <?php if ($user->estudiante->cubre_gastos=='4') { $visible='';}
              else{ $visible='hidden';} 
          ?>
        <div id="div-especifiquen" class="{{$visible}}">
        <input type="text" name="desc_cubre_gastos" id="desc_cubre_gastos" class="col-xs-12 col-sm-6" value="{{$user->estudiante->desc_cubre_gastos}}" placeholder="Especifique aquí...">
        </div>
      </div>
    </div>
<hr>
 <h3 class="lighter block green">3.4 Egreso Familiar</h3>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Alquiler de vivienda</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('a',$egresoFamiliar->a,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Luz</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('b',$egresoFamiliar->b,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Agua</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('c',$egresoFamiliar->c,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Teléfono</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('d',$egresoFamiliar->d,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Cable</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('e',$egresoFamiliar->e,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Internet</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('f',$egresoFamiliar->f,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Alimentación</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('g',$egresoFamiliar->g,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Seguro Integral de Salud</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('h',$egresoFamiliar->h,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">ESSALUD Independiente</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('i',$egresoFamiliar->i,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Gasolina (en caso de tener movilidad)</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('j',$egresoFamiliar->j,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Gas</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('k',$egresoFamiliar->k,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Periódicos, revistas</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('l',$egresoFamiliar->l,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Estudio de idiomas</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('m',$egresoFamiliar->m,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">Estudios Informáticos</label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                        {!!Form::text('n',$egresoFamiliar->n,['required', 'class'=>'col-xs-12 col-sm-6','onkeypress'=>'return valida(event)'])!!}
                      </div>
                    </div>
                </div>
                <?php $etotal= $egresoFamiliar->a+$egresoFamiliar->b+$egresoFamiliar->c+$egresoFamiliar->d+$egresoFamiliar->e+$egresoFamiliar->f+$egresoFamiliar->g+$egresoFamiliar->h+$egresoFamiliar->i+$egresoFamiliar->j+$egresoFamiliar->k+$egresoFamiliar->l+$egresoFamiliar->m+$egresoFamiliar->n;?>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right">=></label>
                    <div class="col-xs-12 col-sm-9">
                      <div class="clearfix">
                         <span style="background-color: yellow; padding: 4px;">
                            <b>Total S/ {{$etotal}} </b></span>
                      </div>
                    </div>
                </div>
               


                  <div class="hr hr-dotted"></div>
                  <div align="center" ><br>
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <input type="submit" value="Actualizar" class="btn btn-info" onclick="lafuncion('/psicoinicios/gastosyotrosdatos','#elformulario3-gastosyotrosdatos','#step-33');"><br><br>
                  </div>

                  <div class="space-2"></div>
{!! Form::close() !!}
</div>
<script type="text/javascript">
  // //para el formulario 3.3 si es otro quien cubre los gastos
  //     function desc_cubre_gasto($ids){
  //     var id=$ids;
  //     //$('#desc_cubre_gastos').val("");

  //     if(id == '4'){
  //         document.getElementById('div-especifiquen').className='';
          
  //     }else{
  //         //document.getElementById('div-especifiquen').style.display = 'none';
  //         document.getElementById('div-especifiquen').className='hidden';
  //     }
  //     }
  //     desc_cubre_gasto('1'); //Enviamos valor != a 4 para que esté oculto
</script>