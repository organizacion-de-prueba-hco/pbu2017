<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="smaller lighter blue no-margin">Editar Procedimiento</h3>
					</div>
			 {!! Form::model($proc,['route'=>['enfotroproc.update',$proc->id],'method' => 'PUT',  'class'=>'form-horizontal form-label-left']) !!}
			 @if(Auth::user()->tipo_user=='2-4-2')
				<div class="modal-body">									
					<div class="item form-group">
                 <div class="col-md-6 col-sm-6 col-xs-12" align="center">
                   <label>Procedimiento</label>
                   <input name="proc" value="{{$proc->procedimiento}}" required="required" class="form-control tamaño" min="0"  type="text" width="100%">
                 </div>
                  <div class="col-md-3 col-sm-3 col-xs-6" align="center">
							<label>Consultorio: </label><br>
							{!!Form::select('area',['0'=>'Medicina','1'=>'Odontología'],$proc->area,['required', 'class'=>'form-control'])!!}
				  </div>
                   <div class="col-md-3 col-sm-3 col-xs-6" align="center">
                       <label>Tarifa</label>
                       <input required="required" value="{{$proc->tarifa}}"  name="tar" type="number" step="any" class="form-control">
                   </div>
                        
                    </div>    
				</div>
				@else
				<div class="modal-body">									
					<div class="item form-group">
                 <div class="col-md-9 col-sm-9 col-xs-12" align="center">
                   <label>Procedimiento</label>
                   <input name="proc" value="{{$proc->procedimiento}}" required="required" class="form-control tamaño" type="text" width="100%">
                 </div>
                  <input type="hidden" name="area" value="1">
                   <div class="col-md-3 col-sm-3 col-xs-6" align="center">
                       <label>Tarifa</label>
                       <input required="required" value="{{$proc->tarifa}}"  name="tar" type="number" step="any" class="form-control">
                   </div>
                        
                </div>    
				</div>
				@endif
				<div class="modal-footer">
					<input type="submit" class="btn btn-sm btn-success" value="Editar">
					<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Cerrar
					</button>
				</div>
				{!!Form::close()!!}
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->