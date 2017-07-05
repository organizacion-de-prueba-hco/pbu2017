<!-- Small modal -->
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Ingreso familiar</h4>
                        </div>
                        <div class="modal-body">                      
                          {!! Form::open(['method'=>'post','id'=>'elformulario3-1-1','class'=>'form-horizontal form-label-left']) !!}
                          <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>PARIENTE</label>
                              <select name="cfamiliar_id" class="form-control unidad">
                                @foreach($cfamiliares as $pte)
                                <?php  
                                    $sensor='0';
                                    foreach ($cfamiliares as $if) {
                                      if ($pte->id==$if->cfamiliar_id) {
                                        $sensor='1';
                                      }
                                    }
                                ?>
                                @if($sensor=='0')
                                 <option value="{{$pte->id}}">{{$pte->parentesco}}: {{$pte->nombres}}</option>
                                  @endif
                                @endforeach
                              </select>
                            </div>
                      </div>
                                            
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>SUELDO O SALARIO</label>
                              {!!Form::text('sueldo', null, [ 'required','onkeypress'=>'return valida(event)','class'=> 'form-control','placeholder'=>'S/'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>HONORARIO PROFESIONALES</label>
                              {!!Form::text('honorario', null, [ 'required','onkeypress'=>'return valida(event)','class'=> 'form-control','placeholder'=>'S/'])!!}
                            </div>
                      </div>

                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>EMPRESA O NEGOCIO</label>
                              {!!Form::text('empresa', null, ['required','class'=> 'form-control', 'placeholder'=>'Empresa o negocio'])!!}
                            </div>
                      </div>
                                      
                      <div class="col-md-6 col-md-offset-3">
                        <div class="modal-footer">
                          <input type="button" class="btn btn-success" data-dismiss="modal" value="Agregar" onclick="lafuncion('fichasocial/nifamiliar','#elformulario3-1-1','#step-33')">
                        </div>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
    </div>