<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="Ltrabajosf">
	           <!-- Small modal -->
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="Ltrabajosf_titulo">EDITAR </h4>
                        </div>

                          {!!Form::open(['method'=>'post','id'=>'elformulario3-Ltrabajosf','class'=>'form-horizontal form-label-left']) !!}
                    <div class="modal-body">
                          <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>LUGAR DE TRABAJO</label>
                              {!!Form::text('lugar_trabajo', null, ['id'=>'lugar_trabajo', 'required','class'=> 'form-control','placeholder'=>'Escribir aquí...'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>FECHA DE INICIO</label>
                              {!!Form::date('trabajo_inicio', null, ['id'=>'trabajo_inicio', 'class'=> 'form-control'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>FECHA DE TÉRMINO</label>
                             {!!Form::date('trabajo_fin', null, ['id'=>'trabajo_fin','class'=> 'form-control'])!!}
                            </div>
                      </div>
                    </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id" value="" id="Ltrabajosf_id">
                          <input type="button" class="btn btn-success" value="Actualizar" data-dismiss="modal" onclick="lafuncion('/fichasocial/editarltrabajosf','#elformulario3-Ltrabajosf','#step-33')">
                        </div>

                      {!! Form::close() !!}
                  </div>

      </div>
</div>