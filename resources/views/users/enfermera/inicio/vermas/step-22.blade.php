<?php use Carbon\Carbon; Carbon::setLocale('es');  ?>
<h2 class="StepTitle">II. ANTECEDENTES</h2>
			
		{!! Form::open(['method'=>'post','id'=>'elformulario1-2','class'=>'form-horizontal form-label-left']) !!}
		<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="space-2"></div><hr>
			<h3 class="lighter block green">2.1 Personal</h3>
									
			<div class="col-12">
				<div class="col-sm-4 col-xs-12" align="left">
					<h4>Consume</h4>
					<div class="form-group">
						<div class="col-xs-12 col-sm-9">
							<label>
								<input name="vc_padre" class="ace" type="checkbox" value="1"
									@if($estudiante->user->vc_padre=='1')
                					checked="checked"
              					@endif
								/>
								<span class="lbl"> Alcohol</span>
							</label><br>
							<label>
								<input name="vc_madre" value="1" class="ace" type="checkbox" 
									@if($estudiante->user->vc_madre=='1')
                						checked="checked"
              					@endif />
								<span class="lbl"> Droga</span>
							</label><br>
							<label>
								<input name="vc_hermano" value="1" type="checkbox" class="ace"
									@if($estudiante->user->vc_hermano=='1')
                						checked="checked"
              					@endif />
								<span class="lbl"> Tabaco</span>
							</label><br>
							<label>
								<input name="vc_conyugue" value="1" type="checkbox" class="ace"
									@if($estudiante->user->vc_conyugue=='1')
                						checked="checked"
              					@endif />
								<span class="lbl"> Café</span>
							</label><br>
						</div>
					</div>
				</div>	

				<div class="col-sm-4 col-xs-12">
					<h4>Patológicos</h4>
					<div class="form-group">
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> HEPATITIS</span>
								</label><br>

								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> TIFOIDEA </span>
								</label><br>

								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> TBC</span>
								</label><br>

								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> TBC</span>
								</label><br>

								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> HTA</span>
								</label><br>

								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> DM</span>
								</label><br>

								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> ASMA</span>
								</label><br>

								<label>
									<input name="p_otros" id="p_otros" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
              						onclick="mostrarotros('p_otros_desc','#p_otros')"
									/>
									<span class="lbl"> OTROS</span>
								</label><br>
								<?php $desc= App\CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','0')->first()->p_otros_desc; ?>
								<label 
									@if($desc == '')
										style="visibility:hidden"
									@endif
								>	
									<input type="text" class="ace" name="p_otros_desc" id="p_otros_desc" class="col-12" value="{{$desc}}"><br>
								</label><br>				
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-xs-12">
					<h4>Qx.</h4>
						<div class="form-group">
							<div class="col-xs-12 col-sm-9">
								<div class="clearfix">
									<textarea name="qx" placeholder="Describir si ha presentado alguna cirugía"  class="form-control" rows="10"></textarea>
								</div>
						</div>
					</div>
				</div>
			</div>			
			
			<div class="col-12">
				<div class="form-group">
					<div class="col-xs-12 col-sm-12"><hr>
            		<h3 class="lighter block green">2.2 Familiar</h3>
            	</div>
         	</div>
         </div>

			<div class="col-12">
				<div class="col-sm-4 col-xs-12" align="left">
					<h4>Consume</h4>
					<div class="form-group">
						<div class="col-xs-12 col-sm-9">
							<label>
								<input name="vc_padre" class="ace" type="checkbox" value="1"
									@if($estudiante->user->vc_padre=='1')
                					checked="checked"
              					@endif
								/>
								<span class="lbl"> Alcohol</span>
							</label><br>
							<label>
								<input name="vc_madre" value="1" class="ace" type="checkbox" 
									@if($estudiante->user->vc_madre=='1')
                						checked="checked"
              					@endif />
								<span class="lbl"> Droga</span>
							</label><br>
							<label>
								<input name="vc_hermano" value="1" type="checkbox" class="ace"
									@if($estudiante->user->vc_hermano=='1')
                						checked="checked"
              					@endif />
								<span class="lbl"> Tabaco</span>
							</label><br>
							<label>
								<input name="vc_conyugue" value="1" type="checkbox" class="ace"
									@if($estudiante->user->vc_conyugue=='1')
                						checked="checked"
              					@endif />
								<span class="lbl"> Café</span>
							</label><br>
						</div>
					</div>
				</div>	

				<div class="col-sm-4 col-xs-12">
					<h4>Patológicos</h4>
					<div class="form-group">
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> HEPATITIS</span>
								</label><br>

								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> TIFOIDEA </span>
								</label><br>

								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> TBC</span>
								</label><br>

								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> TBC</span>
								</label><br>

								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> HTA</span>
								</label><br>

								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> DM</span>
								</label><br>

								<label>
									<input name="vc_padre" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> ASMA</span>
								</label><br>

								<label>
									<input name="p_otros2" id="p_otros2" class="ace" type="checkbox" value="1"
										@if($estudiante->user->vc_padre=='1')
                						checked="checked"
              						@endif
              						onclick="mostrarotros('p_otros_desc2','#p_otros2')"
									/>
									<span class="lbl"> OTROS</span>
								</label><br>
								<?php $desc2 = App\CmAntecedente::where('user_id',$estudiante->user_id)->where('tipo','1')->first()->p_otros_desc; ?>
								<label 
									@if($desc2 == '')
										style="visibility:hidden"
									@endif
								>	
									<input type="text" class="ace" name="p_otros_desc2" id="p_otros_desc2" class="col-12" value="{{$desc2}}"><br>
								</label><br>				
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-xs-12">
					<h4>Qx.</h4>
						<div class="form-group">
							<div class="col-xs-12 col-sm-9">
								<div class="clearfix">
									<textarea name="qx2" placeholder="Describir si ha presentado alguna cirugía"  class="form-control" rows="10"></textarea>
								</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">

				<div class="form-group">
					<div class="col-xs-12 col-sm-12" align="center">
            	<input type="hidden" name="id" value="{{$estudiante->user->id}}">
            	<input type="submit" value="Actualizar" class="btn btn-info" onclick="lafuncion('/fichasocial/general','#elformulario1-2','#step-22')">
            	</div>
         	</div>
         </div>
			<div class="space-2"></div>
								{!! Form::close() !!}
