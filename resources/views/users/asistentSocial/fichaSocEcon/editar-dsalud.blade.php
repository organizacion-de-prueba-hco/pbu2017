                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Editar dato de Salud</h4>
                        </div>
                        {!! Form::model($datoSalud,['method'=>'post','id'=>'elformulario5-editar','class'=>'form-horizontal form-label-left']) !!}
                        <div class="modal-body">                      
                          
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Miembro de la Familia</label>
                              {!!Form::text('ds_pariente', $datoSalud->cuadrofamiliar->parentesco.': '.$datoSalud->cuadrofamiliar->nombres, ['disabled'=>'true','id'=>'ds_pariente', 'required','class'=> 'form-control', 'placeholder'=>''])!!}
                            </div>
                      </div>                   
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Diagnóstico</label>
                              {!!Form::text('diagnostico', null, ['required','class'=> 'form-control','placeholder'=>'Parentesco'])!!}
                            </div>
                      </div>
                      
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>Seguro Médico</label><br>
                              {!!Form::text('seguro_medico', null, ['required','class'=> 'form-control','id'=>'cf_ocupacion', 'placeholder'=>'ocupación'])!!}
                            </div>
                      </div> 

                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Lugar donde se atiende</label>
                              {!!Form::text('lugar_atencion',null,['class'=>'form-control unidad','placeholder' => 'Escribir aquí...'])!!}
                            </div>
                      </div>
                        
                    </div>
                    <div class="modal-footer">
                          <input type="hidden" name="id_salud" value="{{$datoSalud->id}}">
                          <input type="button" class="btn btn-danger" value="Eliminar" data-dismiss="modal" onclick="lafuncion('/fichasocial/eliminardsalud','#elformulario5-editar','#step-55');">
                          <input type="button" class="btn btn-success" value="Actualizar" data-dismiss="modal" onclick="lafuncion('/fichasocial/editardsalud','#elformulario5-editar','#step-55');">
                        </div>
                      {!! Form::close() !!}
                  </div>

      </div>