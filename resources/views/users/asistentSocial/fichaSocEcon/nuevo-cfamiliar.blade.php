           <!-- Small modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="NuevoCfamiliar">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Nuevo integrante</h4>
                        </div>
                        <div class="modal-body">                      
                          {!! Form::open(['method'=>'post','id'=>'elformulario2-1','class'=>'form-horizontal form-label-left']) !!}
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>NOMBRES Y APELLIDOS</label>
                              {!!Form::text('nombres', null, ['autofocus'=>'autofocus', 'required','class'=> 'form-control', 'placeholder'=>''])!!}
                            </div>
                      </div>
                                            
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>PARENTESCO</label>
                              {!!Form::text('parentesco', null, [ 'required','class'=> 'form-control','placeholder'=>'Parentesco'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>FECHA DE NACIMIENTO</label>
                              {!!Form::date('fecha_n', \Carbon\Carbon::now(), ['required','class'=> 'form-control'])!!}
                            </div>
                      </div>
                      
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>GRADO DE INSTRUCCIÓN</label>
                              {!!Form::select('instruccion',$instruccion,null,['required', 'class'=>'form-control unidad'])!!}
                            </div>
                      </div>
                      
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>OCUPACIÓN</label><br>
                              {!!Form::text('ocupacion', null, ['required','class'=> 'form-control', 'placeholder'=>'ocupación'])!!}
                            </div>
                      </div> 
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>RESIDENCIA</label>
                              {!!Form::text('residencia', null, ['required','class'=> 'form-control', 'placeholder'=>'Lugar de residencia'])!!}
                            </div>
                      </div>
                                      
                      <div class="col-md-6 col-md-offset-3">
                        <div class="modal-footer">
                          <input type="hidden" name="iduser" id="iduser">
                          <input type="hidden" name="idestudiante" id="idestudiante">
                          <input type="button" class="btn btn-success" value="Agregar" data-dismiss="modal" 
                          onclick="lafuncion('fichasocial/ncfamiliar','#elformulario2-1','#step-22');">
                        </div>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>

      </div>
    </div>