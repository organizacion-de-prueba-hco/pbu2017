           <!-- Small modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="EditarCfamiliar">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Editar integrante</h4>
                        </div>

                          {!! Form::open(['method'=>'post','id'=>'elformulario2-0','class'=>'form-horizontal form-label-left']) !!}
            <div class="modal-body">
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>NOMBRES Y APELLIDOS</label>
                              {!!Form::text('nombres', null, ['autofocus'=>'autofocus','id'=>'cf_nombres', 'required','class'=> 'form-control', 'placeholder'=>'Nombres y Apellidos'])!!}
                            </div>
                      </div>
                                            
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>PARENTESCO</label>
                              {!!Form::text('parentesco', null, ['required','id'=>'cf_parentesco','class'=> 'form-control','placeholder'=>'Parentesco'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>FECHA DE NACIMIENTO</label>
                              {!!Form::date('f_nac',\Carbon\Carbon::now(), ['id'=>'cf_fecha_n','class'=>'form-control'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>N° DNI</label>
                              {!!Form::text('dni', $user->dni, ['required','id'=>'cf_dni','class'=> 'form-control','placeholder'=>'N° DNI'])!!}
                            </div>
                      </div>
                      
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>GRADO DE INSTRUCCIÓN</label>
                              {!!Form::select('grado_instrucion',$instruccion,null,['required','id'=>'cf_instruccion', 'class'=>'form-control unidad'])!!}
                            </div>
                      </div>
                      
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>OCUPACIÓN</label><br>
                              {!!Form::text('ocupacion', null, ['required','class'=> 'form-control','id'=>'cf_ocupacion', 'placeholder'=>'ocupación'])!!}
                            </div>
                      </div> 
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>RESIDENCIA</label>
                              {!!Form::text('residencia', null, ['required','class'=> 'form-control','id'=>'cf_residencia', 'placeholder'=>'Lugar de residencia'])!!}
                            </div>
                      </div>         
            </div>
               <div class="modal-footer col-md-12">
                  <input type="hidden" name="id" id="cf_id">
                  <input type="button" class="btn btn-danger" value="Eliminar" data-dismiss="modal" onclick="lafuncion('/fichasocial/eliminarcfamiliar','#elformulario2-0','#step-22');lafuncion('/fichasocial/otrosdatossalud','#elformulario5','#step-55');lafuncion('/fichasocial/gastosyotrosdatos','#elformulario3-gastosyotrosdatos','#step-33');">
                  <input type="button" class="btn btn-success" value="Actualizar" data-dismiss="modal" onclick="lafuncion('/fichasocial/ecfamiliar','#elformulario2-0','#step-22');lafuncion('/fichasocial/gastosyotrosdatos','#elformulario3-gastosyotrosdatos','#step-33');lafuncion('/fichasocial/otrosdatossalud','#elformulario5','#step-55');">
               </div>
         {!! Form::close() !!}
      </div>
   </div>
</div>