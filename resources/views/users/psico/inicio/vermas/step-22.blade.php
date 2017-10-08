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
								<input name="c_alcohol_0" disabled='true' class="ace" type="checkbox" value="1"
									@if($antec0->c_alcohol=='1')
                						checked="checked"
              						@endif
								/>
								<span class="lbl"> Alcohol</span>
							</label><br>
							<label>
								<input name="c_droga_0" disabled='true' value="1" class="ace" type="checkbox" 
									@if($antec0->c_droga=='1')
                						checked="checked"
              					@endif />
								<span class="lbl"> Droga</span>
							</label><br>
							<label>
								<input name="c_tabaco_0" disabled='true' value="1" type="checkbox" class="ace"
									@if($antec0->c_tabaco=='1')
                						checked="checked"
              					@endif />
								<span class="lbl"> Tabaco</span>
							</label><br>
							<label>
								<input name="c_cafe_0" disabled='true' value="1" type="checkbox" class="ace"
									@if($antec0->c_cafe=='1')
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
									<input name="p_hepatitis_0" disabled='true' class="ace" type="checkbox" value="1"
										@if($antec0->p_hepatitis=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> HEPATITIS</span>
								</label><br>

								<label>
									<input name="p_tifoidea_0" disabled='true' class="ace" type="checkbox" value="1"
										@if($antec0->p_tifoidea=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> TIFOIDEA </span>
								</label><br>

								<label>
									<input name="p_tbc_0" disabled='true' class="ace" type="checkbox" value="1"
										@if($antec0->p_tbc=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> TBC</span>
								</label><br>

								<label>
									<input name="p_hta_0" disabled='true' class="ace" type="checkbox" value="1"
										@if($antec0->p_hta=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> HTA</span>
								</label><br>

								<label>
									<input name="p_dm_0" disabled='true' class="ace" type="checkbox" value="1"
										@if($antec0->p_dm=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> DM</span>
								</label><br>

								<label>
									<input name="p_asma_0" disabled='true' class="ace" type="checkbox" value="1"
										@if($antec0->p_asma=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> ASMA</span>
								</label><br>

								<label>
									<input name="p_otros_0" disabled='true' id="p_otros_0" class="ace" type="checkbox" value="1"
										@if($antec0->p_otros=='1')
                						checked="checked"
              						@endif
              						onclick="mostrarotros('p_otros_desc_0','#p_otros_0')"
									/>
									<span class="lbl"> OTROS</span>
								</label><br>
								<label 
									@if($antec0->p_otros_desc == '')
										style="visibility:hidden"
									@endif
								>	
									<input type="text" class="ace" disabled='true' name="p_otros_desc_0" id="p_otros_desc_0" class="col-12" value="{{$antec0->p_otros_desc}}"><br>
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
									<textarea name="qx_0"  class="form-control" rows="10" disabled='true'>{{$antec0->qx}}</textarea>
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
								<input name="c_alcohol_1" disabled='true' class="ace" type="checkbox" value="1"
									@if($antec1->c_alcohol=='1')
                						checked="checked"
              						@endif
								/>
								<span class="lbl"> Alcohol</span>
							</label><br>
							<label>
								<input name="c_droga_1" disabled='true' value="1" class="ace" type="checkbox" 
									@if($antec1->c_droga=='1')
                						checked="checked"
              					@endif />
								<span class="lbl"> Droga</span>
							</label><br>
							<label>
								<input name="c_tabaco_1" disabled='true' value="1" type="checkbox" class="ace"
									@if($antec1->c_tabaco=='1')
                						checked="checked"
              					@endif />
								<span class="lbl"> Tabaco</span>
							</label><br>
							<label>
								<input name="c_cafe_1" disabled='true' value="1" type="checkbox" class="ace"
									@if($antec1->c_cafe=='1')
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
									<input name="p_hepatitis_1" disabled='true' class="ace" type="checkbox" value="1"
										@if($antec1->p_hepatitis=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> HEPATITIS</span>
								</label><br>

								<label>
									<input name="p_tifoidea_1" disabled='true' class="ace" type="checkbox" value="1"
										@if($antec1->p_tifoidea=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> TIFOIDEA </span>
								</label><br>

								<label>
									<input name="p_tbc_1" disabled='true' class="ace" type="checkbox" value="1"
										@if($antec1->p_tbc=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> TBC</span>
								</label><br>

								<label>
									<input name="p_hta_1" disabled='true' class="ace" type="checkbox" value="1"
										@if($antec1->p_hta=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> HTA</span>
								</label><br>

								<label>
									<input name="p_dm_1" disabled='true' class="ace" type="checkbox" value="1"
										@if($antec1->p_dm=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> DM</span>
								</label><br>

								<label>
									<input name="p_asma_1" disabled='true' class="ace" type="checkbox" value="1"
										@if($antec1->p_asma=='1')
                						checked="checked"
              						@endif
									/>
									<span class="lbl"> ASMA</span>
								</label><br>

								<label>
									<input name="p_otros_1" disabled='true' id="p_otros_1" class="ace" type="checkbox" value="1"
										@if($antec1->p_otros=='1')
                						checked="checked"
              						@endif
              						onclick="mostrarotros('p_otros_desc_1','#p_otros_1')"
									/>
									<span class="lbl"> OTROS</span>
								</label><br>
								
								<label 
									@if($antec1->p_otros_desc == '')
										style="visibility:hidden"
									@endif
								>	
									<input type="text" class="ace" name="p_otros_desc_1" id="p_otros_desc_1" class="col-12" value="{{$antec1->p_otros_desc}}" disabled='true'><br>
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
									<textarea name="qx_1"  class="form-control" rows="10" disabled='true'>{{$antec1->qx}}</textarea>
								</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">

				<div class="form-group">
					<div class="col-xs-12 col-sm-12" align="center">
            	<input type="hidden" name="id" value="{{$estudiante->user_id}}">
            	<input type="hidden" name="id0" value="{{$antec0->id}}">
            	<input type="hidden" name="id1" value="{{$antec1->id}}">
            	
            	</div>
         	</div>
         </div>
			<div class="space-2"></div>
								{!! Form::close() !!}
