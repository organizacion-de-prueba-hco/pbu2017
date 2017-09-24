<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="smaller lighter blue no-margin">Editar Inventario</h3>
					</div>
			 {!! Form::model($inv,['route'=>['enfotroinv.update',$inv->id],'method' => 'PUT',  'class'=>'form-horizontal form-label-left']) !!}
				<div class="modal-body">									
					<div class="item form-group">
                         <div class="col-md-4 col-sm-4 col-xs-4" align="center">
                          <label>Nombre</label>
                          <input name="nom" value="{{$inv->nombre}}" required="required" class="form-control tamaño" min="0"  type="text">
                        </div>
                        
                        <div class="col-md-4 col-sm-4 col-xs-4" align="center">
                            <label>Descripción</label>
                            <input required="required" value="{{$inv->descripcion}}"  name="desc" type="text">
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-4" align="center">
                            <label>Cantidad</label>
                            <input required="required" value="{{$inv->cantidad}}"  name="cant" type="number" step="any">
                        </div>
                        
                    </div>    
				</div>
				
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