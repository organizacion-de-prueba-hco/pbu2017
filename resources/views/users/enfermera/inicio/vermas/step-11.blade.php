<?php use Carbon\Carbon; Carbon::setLocale('es');  ?>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="Editar-FotoEstudiante">
   <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title">Actualizar foto</h4>
                        </div>
                        <div class="modal-body">                        
                          {!! Form::open(['url' => 'enfmeds/foto','method'=>'post', 'class'=>'form-horizontal form-label-left','enctype'=>'multipart/form-data']) !!}
                          <div class="item form-group">
                            <div class="col-12">
                              <input type="file" id="files-foto-e" name="foto" accept="image/*"/><br>
                              <output id="lista-e"><img src="{{url('imagenes/avatar/'.$estudiante->user->foto)}}" width="100%"></output>
                            </div>
                          </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id-est" value="{{$estudiante->user_id}}">
                          <input type="submit" class="btn btn-success" value="Actualizar" >
                        </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
   </div>
</div>

<h2 class="StepTitle">I. FILIACIÓN</h2>
			<div align="center">
				<a href="#" title="Clic para actualizar foto" data-toggle="modal" 
                   data-target="#Editar-FotoEstudiante" title="Editar">
				<span class="profile-picture">
					<img id="avatar" alt="avatar" src="{{url('imagenes/avatar/'.$estudiante->user->foto)}}" height="170px;">
				</span>
				</a>
			</div><hr>
					{!! Form::open(['method'=>'post','id'=>'elformulario1-11','class'=>'form-horizontal form-label-left']) !!}
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Apellidos y Nombres:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" class="col-xs-12 col-sm-6" value="{{$estudiante->user->apellido_paterno.' '.$estudiante->user->apellido_materno.' '.$estudiante->user->nombres}}" />
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Código:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" name="cod" class="col-xs-12 col-sm-6" value="{{$estudiante->cod_univ}}" disabled="true"/>
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">DNI:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" maxlength="8" name="dni" class="col-xs-12 col-sm-6" value="{{$estudiante->user->dni}}"/>
											</div>
										</div>
									</div>
									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Facultad:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('facultad', $estudiante->escuela->facultad->facultad,['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...','disabled'=>'true'])!!}
											</div>
										</div>
									</div>
									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Escuela Profesional:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('facultad', $estudiante->escuela->escuela,['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Escribir aquí...','disabled'=>'true'])!!}
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Domicilio Actual:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::text('domicilio', $estudiante->user->domicilio, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Nombre de la calle, Av. Jr, etc'])!!}
											</div>
											<div class="clearfix">
												{!!Form::text('n_domicilio', $estudiante->user->n_domicilio, ['class'=> 'col-xs-12 col-sm-6', 'placeholder'=>'Número, Lt., Mz., etc','style'=>'margin-top: 2px;'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Departamento de Nacimiento:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('departamento',$departamentos,$estudiante->user->distrito_naci->provincia->departamento_id,['required','id'=>'departamento_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Departamento'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Provincia de Nacimiento:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('provincia',$provincias,$estudiante->user->distrito_naci->provincia->id,['required','id'=>'provincia_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Provincia'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Distrito de Nacimiento:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('distrito_nac',$distritos,$estudiante->user->distrito_nac,['required','id'=>'distrito_nac', 'class'=>'col-xs-12 col-sm-6','placeholder' => 'Distrito'])!!}
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Estado Civil: </label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('est_civil_id',$est_civils,$estudiante->user->est_civil_id,['required', 'class'=>'col-xs-12 col-sm-6'])!!}
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Sexo:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" maxlength="8" class="col-xs-12 col-sm-6" disabled="true" 
													@if($estudiante->user->genero=='0') 
														value="Femenino"
													@else
														value="Masculino"
													@endif
												/>
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Fecha de Nacimiento (edad):</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<label>
													{!!Form::date('f_nac',$estudiante->user->f_nac,['required','class'=>'col-12'])!!} 
													<?php 
													$fn= Carbon::parse($estudiante->user->f_nac);
													if($estudiante->user->f_nac< Carbon::now() && $estudiante->user->f_nac!='0000-00-00' )
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

												<input type="text" name="ocupacion" class="col-xs-12 col-sm-6" value="{{App\CuadroFamiliar::where('parentesco','YO')->where('user_id',$estudiante->user->id)->first()->ocupacion}}"/>
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Religión:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												{!!Form::select('religion_id',$religiones,$estudiante->user->religion_id,['required','id'=>'e_departamento', 'class'=>'col-xs-12 col-sm-6'])!!}
											</div>
										</div>
									</div>
									<div class="space-2"></div>					
									<div class="hr hr-dotted"></div>
									<div align="center" ><br>
                          			<input type="hidden" name="id" value="{{$estudiante->user_id}}">
                          			<input type="submit" value="Actualizar" class="btn btn-info" onclick="lafuncion('/enfmeds/filiacion','#elformulario1-11','#step-11')"><br><br></div>

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