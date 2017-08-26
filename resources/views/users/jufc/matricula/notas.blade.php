
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
               <h4 class="modal-title" id="myModalLabel2">{{$notas->estudiant->cod_univ}}</h4>
         </div>                      
            {!! Form::model($notas,['route'=>['jufcmatricula.update',$notas->id], 'method'=>'PUT','class'=>'form-horizontal form-label-left']) !!}
         <div class="modal-body">
            <div class="item form-group">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Nombres y Apellidos</label>
                     {!!Form::text('n', $notas->estudiant->user->nombres.' '.$notas->estudiant->user->apellido_paterno.' '.$notas->estudiant->user->apellido_materno, ['required','class'=> 'form-control', 'placeholder'=>'Nombres y Apellidos', 'disabled'=>'true'])!!}
               </div>
            </div>
            <div class="item form-group">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Escuela</label>
                     {!!Form::text('n', $notas->estudiant->escuela->escuela, ['required','class'=> 'form-control', 'placeholder'=>'Nombres y Apellidos', 'disabled'=>'true'])!!}
               </div>
            </div>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxx  NOTAS  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
            <div class="item form-group">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>I EX1 </label>
                     {!!Form::number('i_ex_i', null, ['required','class'=> 'form-control', 'placeholder'=>'Nombres y Apellidos','min'=>'0', 'max'=>'20','step'=>'0.1'])!!}
               </div>
            </div>
                                            
            <div class="item form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label>I EX2</label>
                  {!!Form::number('i_ex_ii', null, ['required','class'=> 'form-control','placeholder'=>'Parentesco', 'min'=>'0', 'max'=>'20','step'=>'0.1' ])!!}
              </div>
            </div>
                  
            <div class="item form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label>I PAR</label>
                  {!!Form::number('i_par', null, ['required','class'=> 'form-control','placeholder'=>'Parentesco','min'=>'0', 'max'=>'20','step'=>'0.1'])!!}
              </div>
            </div>

            <div class="item form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label>I PRE</label>
                  {!!Form::number('i_pre', null, ['required','class'=> 'form-control','placeholder'=>'Parentesco','min'=>'0', 'max'=>'20','step'=>'0.1'])!!}
              </div>
            </div>

            <div class="item form-group">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>II EX1 </label>
                     {!!Form::number('ii_ex_i', null, ['required','class'=> 'form-control', 'placeholder'=>'Nombres y Apellidos','min'=>'0', 'max'=>'20','step'=>'0.1'])!!}
               </div>
            </div>
                                            
            <div class="item form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label>II EX2</label>
                  {!!Form::number('ii_ex_ii', null, ['required','class'=> 'form-control','placeholder'=>'Parentesco','min'=>'0', 'max'=>'20','step'=>'0.1'])!!}
              </div>
            </div>
                  
            <div class="item form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label>II PAR</label>
                  {!!Form::number('ii_par', null, ['required','class'=> 'form-control','placeholder'=>'Parentesco','min'=>'0', 'max'=>'20','step'=>'0.1'])!!}
              </div>
            </div>

            <div class="item form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label>II PRE</label>
                  {!!Form::number('ii_pre', null, ['required','class'=> 'form-control','placeholder'=>'Parentesco','min'=>'0', 'max'=>'20','step'=>'0.1'])!!}
              </div>
            </div>



         </div>
         <div class="modal-footer">
            <input type="submit" class="btn btn-success" value="Actualizar">
         </div>
         {!! Form::close() !!}
      </div>
   </div>