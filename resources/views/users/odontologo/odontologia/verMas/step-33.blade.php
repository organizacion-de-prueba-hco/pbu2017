<?php use Carbon\Carbon; Carbon::setLocale('es');  ?>
<h2 class="StepTitle">III. Odontología</h2>
			<hr>
					{!! Form::open(['url' => 'odontodontos/registrar','method'=>'post', 'class'=>'form-horizontal form-label-left']) !!}	
												
					<div class="space-2"></div><hr>
					<h3 class="lighter block green">3.1 Motivo de Consulta</h3>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Motivo de Consulta:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" name="i_motivo_consulta" class="col-xs-12 col-sm-6" value="{{$medicina->i_motivo_consulta}}" placeholder="Describir el motivo de la consulta" />
							</div>
						</div>
					</div>
					<div class="space-2"></div><hr>
					<h3 class="lighter block green">3.2 Estado de salud General</h3>
						<div class="form-group">
							<div class="col-xs-12 col-sm-9">
								<label>
									<input name="ii_a" class="ace" type="checkbox" value="1"
										@if($medicina->ii_a=='1')
                						checked="checked" 
              						@endif
              					/>
									<span class="lbl"> Presenta alguna enfermedad sistemica actualmente</span>
								</label><br>
								<label>
									<input name="ii_b"  class="ace" type="checkbox" value="1"
										@if($medicina->ii_b=='1')
                						checked="checked" 
                					@endif
									/>
									<span class="lbl"> Presenta alguna enfermedad sistemica anteriormente</span>
								</label><br>
								<label>
									<input name="ii_c" value="1" type="checkbox" class="ace" value="1"
										@if($medicina->ii_c=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl"> Alergico a algún medicamento o sustencia</span>
								</label><br>
								<label>
									<input name="ii_d" value="1" type="checkbox" class="ace" value="1"
										@if($medicina->ii_d=='1')
                						checked="checked" 
              						@endif
              					/>
									<span class="lbl"> Antecedentes de operaciones</span>
								</label><br>
							</div>
						</div>
					<div class="space-2"></div><hr>
					<h3 class="lighter block green">3.3 Examen de salud Bucodental</h3>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">a) Examen Odontológico: </label><br>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix" align="center">
								<img src="{{URL::to('imagenes/odontograma.png')}}">
							</div>
							<div class="clearfix" align="center">
								<label>
									<input name="iii_xviii" class="ace" type="checkbox" value="1"
										@if($medicina->iii_xviii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">18 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xvii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xvii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">17 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xvi" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xvi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">16 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">15 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xiv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xiv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">14 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xiii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xiii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">13 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">12 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xi" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">11&nbsp;&nbsp;-&nbsp;&nbsp;</span>
								</label>
								<label>
									<input name="iii_xxi" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">21 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxii=='1')
                						checked="checked"
              						@endif/>
									<span class="lbl">22 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxiii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxiii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">23 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxiv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxiv=='1')
                						checked="checked"
              						@endif 
              					/>
									<span class="lbl">24 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">25 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxvi" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxvi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">26 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxvii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxvii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">27 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxviii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxviii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">28 </span> &nbsp;
								</label><br>

								<label>
									<input name="iii_lv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">55 </span> &nbsp;
								</label>
								<label>
									<input name="iii_liv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xliv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">54 </span> &nbsp;
								</label>
								<label>
									<input name="iii_liii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_liii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">53 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">52 </span> &nbsp;
								</label>
								<label>
									<input name="iii_li" value="1" class="ace" type="checkbox"
										@if($medicina->iii_li=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">51&nbsp;&nbsp;-&nbsp;&nbsp;</span>
								</label>
								<label>
									<input name="iii_lxi" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">61 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxii" value="1" class="ace" type="checkbox"				
										@if($medicina->iii_lxii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">62 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxiii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxiii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">63 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxiv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxiv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">64 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">65 </span> &nbsp;
								</label><br>

								<label>
									<input name="iii_lxxxv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxxxv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">85 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxxiv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxxxiv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">84 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxxiii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxxxiii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">83 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxxii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxxxii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">82 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxxi" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxxxi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">81&nbsp;&nbsp;-&nbsp;&nbsp;</span>
								</label>
								<label>
									<input name="iii_lxxi" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxxi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">71 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxxii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">72 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxiii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxxiii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">73 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxiv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxxiv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">74 </span> &nbsp;
								</label>
								<label>
									<input name="iii_lxxv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_lxxv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">75 </span> &nbsp;
								</label><br>

								<label>
									<input name="iii_xlviii" class="ace" type="checkbox" value="1"
										@if($medicina->iii_xlviii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">48 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xlvii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xlvii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">47 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xlvi" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xlvi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">46 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xlv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xlv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">45 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xliv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xliv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">44 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xliii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xliii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">43 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xlii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xlii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">42 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xli" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xli=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">41&nbsp;&nbsp;-&nbsp;&nbsp;</span>
								</label>
								<label>
									<input name="iii_xxxi" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxxi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">31 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxxii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">32 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxiii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxxiii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">33 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxiv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxxiv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">34 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxv" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxxv=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">35 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxvi" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxxvi=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">36 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxvii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxxvii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">37 </span> &nbsp;
								</label>
								<label>
									<input name="iii_xxxviii" value="1" class="ace" type="checkbox"
										@if($medicina->iii_xxxviii=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl">38 </span> &nbsp;
								</label><br>
							</div>
						</div>
						<label class="control-label col-xs-12 col-sm-3 no-padding-right"><br>b) Examen Bucal: </label><br>
						<div class="col-xs-12 col-sm-9"><br><br> con patologías en...<br>
								<label>
									<input name="iii_b_a" value="1" class="ace" type="checkbox"
										@if($medicina->iii_b_a=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl"> Encias </span> &nbsp;
								</label><br>
								<label>
									<input name="iii_b_b" value="1" class="ace" type="checkbox"
										@if($medicina->iii_b_b=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl"> ATM </span> &nbsp;
								</label><br>
								<label>
									<input name="iii_b_c" value="1" class="ace" type="checkbox"
										@if($medicina->iii_b_c=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl"> Mucosas </span> &nbsp;
								</label><br>
								<label>
									<input name="iii_b_d" value="1" class="ace" type="checkbox"
										@if($medicina->iii_b_d=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl"> Labios </span> &nbsp;
								</label><br>
								<label>
									<input name="iii_b_e" value="1" class="ace" type="checkbox"
										@if($medicina->iii_b_e=='1')
                						checked="checked"
              						@endif
              					/>
									<span class="lbl"> Lengua </span> &nbsp;
								</label><br>

								<label>
									<input name="iii_b_f" class="ace" id="p_otros_3" type="checkbox" value="1" 
										@if($medicina->iii_b_f=='1')
                						checked="checked"
                					@endif
                						onclick="mostrarotros('p_otros_desc_3','#p_otros_3')"
              						
              					/>
									<span class="lbl"> Otros </span> &nbsp;
								</label><br>
								<label class="control-label col-xs-12 col-sm-3 no-padding-right"
										 @if($medicina->iii_b_otros == '')
											style="visibility:hidden"
										 @endif
								>
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-xs-12 col-sm-9">
							<div class="clearfix">
								<textarea  name="iii_b_otros" id="p_otros_desc_3"  class="col-sm-12" placeholder="Puede user este espacio para detallar el gráfico 3.3-a" rows="4">{{$medicina->iv_diagnostico}}{{$medicina->iii_b_otros}}</textarea>
							</div>
						</div>
					</div>
					<div class="space-2"></div><hr>
					<h3 class="lighter block green">3.4 Diagnóstico</h3>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Diagnóstico:</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<textarea name="iv_diagnostico" class="col-xs-12" placeholder="Escribir aquí el diagnóstico del paciente">{{$medicina->iv_diagnostico}}</textarea>
							</div>
						</div>
					</div>
					<div id="div-de-tablas">
						@include('users.odontologo.odontologia.verMas.step-33-tablas')	
					</div>
									<div align="center" ><br>
                          			<input type="hidden" name="user_id" value="{{$user->id}}">
                          			<input type="hidden" name="odontologo_id" value="{{Auth::user()->id}}">
                          			<input type="hidden" name="o_id" value="{{$medicina->id}}">
                          			<input type="submit" value="Enviar datos" class="btn btn-info"><br><br></div>

									<div class="space-2"></div>
								{!! Form::close() !!}