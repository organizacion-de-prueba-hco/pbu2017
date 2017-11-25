<?php use Carbon\Carbon; Carbon::setLocale('es');  ?>

<h2 class="StepTitle">I. FILIACIÓN</h2>
			
					{!! Form::open(['method'=>'post','id'=>'elformulario1-11','class'=>'form-horizontal form-label-left']) !!}
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">DNI</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="number" placeholder="DNI" class="col-xs-12 col-sm-6" maxlength="8" required="required" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="dni" value="{{$user->dni}}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Apellido Paterno</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="col-xs-12 col-sm-6" name="apellido_paterno" value="{{$user->apellido_paterno}}" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Apellido Materno</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="col-xs-12 col-sm-6" name="apellido_materno" value="{{$user->apellido_materno}}" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nombres</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="col-xs-12 col-sm-6" name="nombres" value="{{$user->nombres}}" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Domicilio Actual:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::text('domicilio', $user->domicilio, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Nombre de la calle, Av. Jr, etc'])!!}
							</div>
							<div class="clearfix">
								{!!Form::text('n_domicilio', $user->n_domicilio, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Número, Lt., Mz., etc','style'=>'margin-top: 2px;'])!!}
							</div>
						</div>
					</div>

					<div class="space-2"></div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Departamento de Nacimiento:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('departamento',$departamentos,$user->distrito_naci->provincia->departamento_id,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Departamento'])!!}
							</div>
						</div>
					</div>

					<div class="space-2"></div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Provincia de Nacimiento:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('provincia',$provincias,$user->distrito_naci->provincia->id,['required','id'=>'provincia_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Provincia'])!!}
							</div>
						</div>
					</div>

					<div class="space-2"></div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Distrito de Nacimiento:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('distrito_nac',$distritos,$user->distrito_nac,['required','id'=>'distrito_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Distrito'])!!}
							</div>
						</div>
					</div>

					<div class="space-2"></div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Estado Civil: </label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('est_civil_id',$est_civils,$user->est_civil_id,['required', 'class'=>'col-xs-12 col-sm-6'])!!}
							</div>
						</div>
					</div>
					<div class="space-2"></div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Sexo:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('sexo',['1'=>'Masculino','0'=>'Femenino'],$user->genero,['required', 'class'=>'col-xs-12 col-sm-6'])!!}
							</div>
						</div>
					</div>
					<div class="space-2"></div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Fecha de Nacimiento (edad):</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<label>
								{!!Form::date('f_nac',$user->f_nac,['required','class'=>'col-12'])!!} 
													<?php 
													$fn= Carbon::parse($user->f_nac);
													if($user->f_nac< Carbon::now() && $user->f_nac!='0000-00-00' )
													{
														 echo "(".Carbon::createFromDate(
															$fn->format('Y'),
															$fn->format('m'),
															$fn->format('d')
														)->age.' años)';
													 }
													?>
								</label>
							</div>
						</div>
					</div>
					<div class="space-2"></div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">OCUPACIÓN:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" name="ocupacion" class="col-xs-12 col-sm-6" value="{{App\CuadroFamiliar::where('parentesco','YO')->where('user_id',$user->id)->first()->ocupacion}}"/>
							</div>
						</div>
					</div>
					<div class="space-2"></div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Religión:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('religion_id',$religiones,$user->religion_id,['required','id'=>'e_departamento', 'class'=>'col-xs-12 col-sm-6'])!!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Usuario</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								{!!Form::select('usuario',$usuario,$user->noestudiante->usuario,['required','class'=>'col-xs-12 col-sm-6'])!!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Descripción de Usuario</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" name="usuario_descripcion" class="col-xs-12 col-sm-6" value="{{$user->noestudiante->usuario_descripcion}}" />
							</div>
						</div>
					</div>

					<div class="space-2"></div>					
					<div class="hr hr-dotted"></div>
					<div align="center" ><br>
               <input type="hidden" name="id" value="{{$user->id}}">
                <input type="submit" value="Actualizar" class="btn btn-info" onclick="lafuncion('/medmeds/filiacion0','#elformulario1-11','#step-11')"><br><br></div>

					<div class="space-2"></div>
					{!! Form::close() !!}
<script type="text/javascript">
	//imagenes
    //Mostrar imagenes del imput file
    function foto(evt) {
      var files = evt.target.files; // FileList object
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
           var reader = new FileReader();
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("lista-e").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
  	}      
      document.getElementById('files-foto-e').addEventListener('change', foto, false);

</script>