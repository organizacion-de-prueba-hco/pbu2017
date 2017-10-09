           <!-- Small modal -->
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Nuevo Datos de Salud</h4>
                        </div>

                          {!!Form::open(['method'=>'post','id'=>'elformulario5-nuevo','class'=>'form-horizontal form-label-left']) !!}
                        <div class="modal-body">
                          <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Miembro de la Familia</label>
                              <select class="form-control" name="miembro_familiar">
                                @foreach($CuadroFamiliar as $cf)
                                  <?php  
                                    $dsalud=App\DatosSalud::where('miembro_familiar',$cf->id)->first();
                                    if ($dsalud) {
                                      continue;
                                    }
                                  ?>
                                  <option value="{{$cf->id}}">{{$cf->parentesco}}: {{$cf->nombres}}</option>
                                @endforeach
                              </select>
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Diagnóstico</label>
                              {!!Form::text('diagnostico', null, ['required','class'=> 'form-control','placeholder'=>'Escribir aquí...'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Seguro Médico</label>
                              {!!Form::text('seguro_medico', null, ['required','class'=> 'form-control', 'placeholder'=>'Escribir aquí...'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Lugar dónde se atiende</label>
                              {!!Form::text('lugar_atencion', null, ['class'=> 'form-control', 'placeholder'=>'Escribir aquí...'])!!}
                            </div>
                      </div>
                      </div>
                        <div class="modal-footer">
                          <input type="hidden" name="user_id" value="{{$user_id}}">
                          <input type="button" class="btn btn-success" value="Actualizar" data-dismiss="modal" onclick="lafuncion('/fichasocial/agregarnuevodsalud','#elformulario5-nuevo','#step-55')">
                        </div>

                      {!! Form::close() !!}
                  </div>

      </div>