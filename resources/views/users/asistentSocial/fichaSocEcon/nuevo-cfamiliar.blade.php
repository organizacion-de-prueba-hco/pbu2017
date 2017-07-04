           <!-- Small modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="NuevoCfamiliar">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
               <h4 class="modal-title" id="myModalLabel2">Nuevo integrante</h4>
         </div>                      
            {!! Form::open(['method'=>'post','id'=>'elformulario2-nuevo','class'=>'form-horizontal form-label-left']) !!}
         <div class="modal-body">
            <div class="item form-group">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>NOMBRES Y APELLIDOS</label>
                     {!!Form::text('nombres', null, ['autofocus'=>'autofocus', 'required','class'=> 'form-control', 'placeholder'=>'Nombres y Apellidos'])!!}
               </div>
                      </div>
                                            
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>PARENTESCO</label>
                              {!!Form::text('parentesco', null, ['required','class'=> 'form-control','placeholder'=>'Parentesco'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>FECHA DE NACIMIENTO</label>
                              {!!Form::date('f_nac',\Carbon\Carbon::now(), ['class'=>'form-control'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>N° DNI</label>
                              {!!Form::text('dni',null, ['required','class'=> 'form-control','placeholder'=>'N° DNI'])!!}
                            </div>
                      </div>
                      
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>GRADO DE INSTRUCCIÓN</label>
                              {!!Form::select('grado_instrucion',$instruccion,null,['required', 'class'=>'form-control unidad'])!!}
                            </div>
                      </div>
                      
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>OCUPACIÓN</label><br>
                              {!!Form::text('ocupacion', null, ['required','class'=> 'form-control','placeholder'=>'ocupación'])!!}
                            </div>
                      </div> 
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>RESIDENCIA</label>
                              {!!Form::text('residencia', null, ['required','class'=> 'form-control','placeholder'=>'Lugar de residencia'])!!}
                            </div>
                      </div>         
         </div>
         <div class="modal-footer">
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <input type="button" class="btn btn-success" value="Agregar" 
            data-dismiss="modal" onclick="lafuncion('/fichasocial/nuevocfamiliar','#elformulario2-nuevo','#step-22');">
         </div>
         {!! Form::close() !!}
      </div>
   </div>
</div>