<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="smaller lighter blue no-margin">Lista de Procedimientos</h3>
					</div>
			 {!! Form::model($proc,['route'=>['enfotroproc.update',$proc->id],'method' => 'PUT',  'class'=>'form-horizontal form-label-left']) !!}
				<div class="modal-body">									
					<div class="item form-group">
                         <div class="col-md-4 col-sm-4 col-xs-4" align="center">
                          <label>Procedimiento</label>
                          <input name="proc" value="{{$proc->procedimiento}}" required="required" class="form-control tamaño" min="0"  type="text">
                        </div>
                        
                        <div class="col-md-4 col-sm-4 col-xs-4" align="center">
                            <label>Tarifa</label>
                            <input required="required" value="{{$proc->tarifa}}"  name="tar" type="number" step="any">
                        </div>
                        
                    </div>    
				</div>
				
				<div class="modal-footer">
					<input type="submit" class="btn btn-sm btn-success" value="Editar">
					<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Close
					</button>
				</div>
				{!!Form::close()!!}
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->