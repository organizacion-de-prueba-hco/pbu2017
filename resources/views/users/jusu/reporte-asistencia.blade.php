<!-- Small modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="asistencia">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title">Generar Reporte de Asistencias y Faltas</h4>
                        </div>
                        <div class="modal-body">                        
                          {!! Form::open(['url' => 'jusuexpedientes/asistencia','method'=>'post', 'class'=>'form-horizontal form-label-left','enctype'=>'multipart/form-data']) !!}
                          <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Inicio </label>
                            <div class="col-sm-9">
                              <input type="date" id="form-field-1" name="inicio" class="col-12"  required="true">
                             </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fin </label>
                            <div class="col-sm-9">
                              <input type="date" id="form-field-1" name="fin" class="col-12" required="true">
                             </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> 
                          <i class="ace-icon fa fa-file-excel-o"> Descargar</i>
                        </button>
                        </div>
                      {!! Form::close() !!}
                  </div>
      </div>
    </div>
    <!--FIN modal-->