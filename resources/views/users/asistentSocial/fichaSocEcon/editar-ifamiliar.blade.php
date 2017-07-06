           <!-- Small modal -->
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">INGRESO: {{$ingresoPariente->parentesco}}</h4>
                        </div>

                          {!!Form::model($ingresoPariente,['method'=>'post','id'=>'elformulario3-editar','class'=>'form-horizontal form-label-left']) !!}
                        <div class="modal-body">
                          <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>SUELDO O SALARIO</label>
                              {!!Form::text('sueldo', null, ['id'=>'if_sueldo', 'required','onkeypress'=>'return valida(event)','class'=> 'form-control','placeholder'=>'S/'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>HONORARIO PROFESIONALES</label>
                              {!!Form::text('honorario', null, ['id'=>'if_honorario', 'required','onkeypress'=>'return valida(event)','class'=> 'form-control','placeholder'=>'S/'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>PENSIÓN POR VIUDEZ</label>
                              {!!Form::text('pension', null, ['id'=>'if_empresa','required','onkeypress'=>'return valida(event)','class'=> 'form-control', 'placeholder'=>'Empresa o negocio'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>EMPRESA O NEGOCIO</label>
                              {!!Form::text('empresa', null, ['id'=>'if_empresa','required','onkeypress'=>'return valida(event)','class'=> 'form-control', 'placeholder'=>'Empresa o negocio'])!!}
                            </div>
                      </div>
                      </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id" value="{{$ingresoPariente->id}}">
                          <input type="button" class="btn btn-success" value="Actualizar" data-dismiss="modal" onclick="lafuncion('/fichasocial/editaringresofamiliar','#elformulario3-editar','#step-33')">
                        </div>

                      {!! Form::close() !!}
                  </div>

      </div>