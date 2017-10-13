           <style type="text/css">
             .thumb{
               border: 1px solid #000;
               margin: 10px 5px 0 0;
               width: 100%;
               text-align: center;
            }

           </style>

           <!-- Small modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="EditarFotoEstudiante">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title">Actualizar foto del estudiante</h4>
                        </div>
                        <div class="modal-body">                        
                          {!! Form::open(['url' => 'psicoinicios/foto','method'=>'post', 'class'=>'form-horizontal form-label-left','enctype'=>'multipart/form-data']) !!}
                          <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <input type="file" id="files-foto" name="foto" accept="image/*"/><br>
                              <output id="lista"><img src="{{url('imagenes/avatar/'.$user->foto)}}" width="100%"></output>
                            </div>
                          </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id" value="{{$user->id}}">
                          <input type="submit" class="btn btn-success" value="Actualizar" >
                        </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
      </div>
    </div>