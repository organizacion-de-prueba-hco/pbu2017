           <!-- Small modal -->
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Editar ingreso familiar</h4>
                        </div>
                        <div class="modal-body">
                          {!!Form::model($ingresoPariente,['method'=>'post','id'=>'elformulario3-1-2','class'=>'form-horizontal form-label-left']) !!}
                          <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>PARIENTE</label>
                              {!!Form::select('parentesco',$OtrosParientes,'2',['required','id'=>'e_departamento', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Seleccione'])!!}
                            </div>
                      </div>
                                            
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
                            <label>EMPRESA O NEGOCIO</label>
                              {!!Form::text('empresa', null, ['id'=>'if_empresa','required','class'=> 'form-control', 'placeholder'=>'Empresa o negocio'])!!}
                            </div>
                      </div>
                                      
                      <div class="col-md-12">
                        <div class="modal-footer">
                          <input type="hidden" name="id" value="{{$ingresoPariente->id}}">
                           <input type="button" class="btn btn-danger" value="Eliminar" data-dismiss="modal" onclick="lafuncion('fichasocial/difamiliar','#elformulario3-1-2','#step-33')">
                          <input type="button" class="btn btn-success" value="Actualizar" data-dismiss="modal" onclick="lafuncion('fichasocial/eifamiliar','#elformulario3-1-2','#step-33')">
                        </div>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>

      </div>
      <script type="text/javascript">
        function selects(){
          var idpariente= "<?php echo $ingresoPariente->id; ?>"
          $("#cfamiliar_id option[value='"+idpariente+"']").attr("selected",true);
        }
    selects();
      </script>