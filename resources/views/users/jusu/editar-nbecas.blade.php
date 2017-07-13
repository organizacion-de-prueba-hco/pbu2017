<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="smaller lighter blue no-margin">N° Becas</h3>
					</div>
			 {!! Form::model($nb,['route'=>['jusunbecas.update',$nb->id],'method' => 'PUT',  'class'=>'form-horizontal form-label-left']) !!}
				<div class="modal-body">									
					<div class="item form-group">
                           <label id="ed_ep"> EP: {{$nb->escuela->escuela}}</label><br>
                        <div class="col-md-4 col-sm-4 col-xs-4" align="center">
                          <label>A</label>

                          <input name="a" value="{{$nb->a}}" required="required" class="form-control tamaño" min="0"  type="number">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4" align="center">
                            <label>B</label>
                            <input required="required" value="{{$nb->b}}" class="form-control tamaño" min="0" name="b" type="number">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4" align="center">
                              <label>C</label>
                              <input required="required" value="{{$nb->c}}" class="form-control tamaño" min="0" name="c" type="number">
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