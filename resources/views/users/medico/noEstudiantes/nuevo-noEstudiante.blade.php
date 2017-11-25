<!--Modal Nuevo Medicamento-->
<div id="nuevo-noEst" class="modal fade bs-example-modal-sm" tabindex="" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h3 class="smaller lighter blue no-margin">Nuevo Registro</h3>
			</div>

			<div class="modal-body" align="center">
				{!! Form::open(['url' => 'medicos/noestudiantesnuevo', 'method'=>'post','class'=>'form-horizontal form-label-left']) !!}
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">DNI</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="number" placeholder="DNI" class="col-xs-12 col-sm-6" maxlength="8" required="required" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="dni" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Apellido Paterno</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="form-control" name="apellido_paterno" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Apellido Materno</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="form-control" name="apellido_materno" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nombres</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="form-control" name="nombres" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Género</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<select name="genero" class="col-xs-12 col-sm-6">
									<option value="0">Femenino</option>
									<option value="1">Masculino</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Estado Civil</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('est_civil_id',$est_civils,null,['class'=>'col-xs-12 col-sm-6'])!!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Religión:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('religion_id',$religiones,null,['class'=>'col-xs-12 col-sm-6'])!!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Domicilio Actual</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::text('domicilio', null, ['class'=> 'form-control', 'placeholder'=>'Nombre de la calle, Av. Jr, etc'])!!}
							</div>
							<div class="clearfix">
								{!!Form::text('n_domicilio', null, ['class'=> 'form-control', 'placeholder'=>'Número, Lt., Mz., etc','style'=>'margin-top: 2px;'])!!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Dep. de Nacimiento</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('departamento',$departamentos,'10',['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Departamento'])!!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Prov. de Nacimiento</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('provincia',$provincias,'87',['required','id'=>'provincia_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Provincia'])!!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Dist. de Nacimiento</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('distrito_nac',$distritos,'887',['required','id'=>'distrito_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Distrito' ])!!}
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Fecha de Nacimiento</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
									{!!Form::date('f_nac',null,['class'=>'col-xs-12 col-sm-6'])!!}		
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">OCUPACIÓN</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" name="ocupacion" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Usuario</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('usuario',$usuario,null,['required','id'=>'provincia_nac', 'class'=>'col-xs-12 col-sm-6'])!!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Descripción de Usuario</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" name="usuario_descripcion" class="form-control" />
							</div>
						</div>
					</div>
			</div>
					<div class="modal-footer">
               	<div class="form-group">
							<div class="col-xs-12 col-sm-12">
		            	<input type="submit" class="btn btn-success" value="Registrar">
		            	</div>
		         	</div>
		         </div>
				{!!Form::close()!!}
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--Fin Nuevo Medicamento-->