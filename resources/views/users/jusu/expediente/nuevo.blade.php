@extends('master.jusu')
@section('activacion')
	<?php
$oa = 'active';
$a  = '';
$b  = '';
$c  = '';
$c1 = '';
$c2 = '';
$c3 = '';
$c4 = '';
$d  = '';
$d1 = '';
$d2 = '';
$d3 = '';
$d4 = '';
$e  = '';
?>
@endsection
@section('titulo','Nuevo Expediente')
@section('estilos')
	<style type="text/css">
		label{
			font-size: 14px;
			color: blue;
			font-weight: bold;
		}
		p{
			font-size: 15px;
		}
	</style>
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-list-alt"></i>
	<li class="active">Expediente</li>
</ul>
@endsection
@section('contenido')

<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text Field </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Full Length </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control">
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Password Field </label>

										<div class="col-sm-9">
											<input type="password" id="form-field-2" placeholder="Password" class="col-xs-10 col-sm-5">
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">Inline help text</span>
											</span>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Readonly field </label>

										<div class="col-sm-9">
											<input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="This text field is readonly!">
											<span class="help-inline col-xs-12 col-sm-7">
												<label class="middle">
													<input class="ace" type="checkbox" id="id-disable-check">
													<span class="lbl"> Disable it!</span>
												</label>
											</span>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-4">Relative Sizing</label>

										<div class="col-sm-9">
											<input class="input-sm" type="text" id="form-field-4" placeholder=".input-sm">
											<div class="space-2"></div>

											<div class="help-block ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="input-size-slider" style="width: 200px;"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span></div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-5">Grid Sizing</label>

										<div class="col-sm-9">
											<div class="clearfix">
												<input class="col-xs-1" type="text" id="form-field-5" placeholder=".col-xs-1">
											</div>

											<div class="space-2"></div>

											<div class="help-block ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="input-span-slider"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span></div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Input with Icon</label>

										<div class="col-sm-9">
											<span class="input-icon">
												<input type="text" id="form-field-icon-1">
												<i class="ace-icon fa fa-leaf blue"></i>
											</span>

											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2">
												<i class="ace-icon fa fa-leaf green"></i>
											</span>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-6">Tooltip and help button</label>

										<div class="col-sm-9">
											<input data-rel="tooltip" type="text" id="form-field-6" placeholder="Tooltip on hover" title="" data-placement="bottom" data-original-title="Hello Tooltip!">
											<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="More details." title="" data-original-title="Popover on hover">?</span>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">Tag input</label>

										<div class="col-sm-9">
											<div class="inline"><div class="tags"><span class="tag">Tag Input Control<button type="button" class="close">×</button></span><span class="tag">Programmatically Added<button type="button" class="close">×</button></span><input type="text" name="tags" id="form-field-tags" value="Tag Input Control" placeholder="Enter tags ..." style="display: none;"><input type="text" placeholder="Enter tags ..."></div>

											</div>
										</div>
									</div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="button">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>

									<div class="hr hr-24"></div>

									<div class="row">
										<div class="col-xs-12 col-sm-4">

										</div><!-- /.span -->

										<div class="col-xs-12 col-sm-4">

										</div><!-- /.span -->

										<div class="col-xs-12 col-sm-4">

										</div><!-- /.span -->
									</div><!-- /.row -->

									<div class="space-24"></div>

									<h3 class="header smaller lighter blue">
										Checkboxes &amp; Radio
										<small>All Checkboxes, Radios and Switch Buttons Are Pure CSS</small>
									</h3>

									<div class="row">
										<div class="col-xs-12 col-sm-5">
											<div class="control-group">
												<label class="control-label bolder blue">Checkbox</label>

												<div class="checkbox">
													<label>
														<input name="form-field-checkbox" type="checkbox" class="ace">
														<span class="lbl"> choice 1</span>
													</label>
												</div>

												<div class="checkbox">
													<label>
														<input name="form-field-checkbox" type="checkbox" class="ace">
														<span class="lbl"> choice 2</span>
													</label>
												</div>

												<div class="checkbox">
													<label>
														<input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox">
														<span class="lbl"> choice 3</span>
													</label>
												</div>

												<div class="checkbox">
													<label class="block">
														<input name="form-field-checkbox" disabled="" type="checkbox" class="ace">
														<span class="lbl"> disabled</span>
													</label>
												</div>

												<div class="checkbox">
													<label class="block">
														<input name="form-field-checkbox" type="checkbox" class="ace input-lg">
														<span class="lbl bigger-120"> large checkbox</span>
													</label>
												</div>
											</div>
										</div>

										<div class="col-xs-12 col-sm-6">
											<div class="control-group">
												<label class="control-label bolder blue">Radio</label>

												<div class="radio">
													<label>
														<input name="form-field-radio" type="radio" class="ace">
														<span class="lbl"> radio option 1</span>
													</label>
												</div>

												<div class="radio">
													<label>
														<input name="form-field-radio" type="radio" class="ace">
														<span class="lbl"> radio option 2</span>
													</label>
												</div>

												<div class="radio">
													<label>
														<input name="form-field-radio" type="radio" class="ace">
														<span class="lbl"> radio option 3</span>
													</label>
												</div>

												<div class="radio">
													<label>
														<input disabled="" name="form-field-radio" type="radio" class="ace">
														<span class="lbl"> disabled</span>
													</label>
												</div>

												<div class="radio">
													<label>
														<input name="form-field-radio" type="radio" class="ace input-lg">
														<span class="lbl bigger-120"> large radio</span>
													</label>
												</div>
											</div>
										</div>
									</div><!-- /.row -->

									<hr>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3">On/Off Switches</label>

										<div class="controls col-xs-12 col-sm-9">
											<div class="row">
												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch" type="checkbox">
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-2" type="checkbox">
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-3" type="checkbox">
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch" type="checkbox">
														<span class="lbl" data-lbl="CUS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TOM"></span>
													</label>
												</div>
											</div>

											<div class="row">
												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-4" type="checkbox">
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-5" type="checkbox">
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox">
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-7" type="checkbox">
														<span class="lbl"></span>
													</label>
												</div>
											</div>

											<div class="row">
												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch btn-rotate" type="checkbox">
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox">
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-4 btn-empty" type="checkbox">
														<span class="lbl"></span>
													</label>
												</div>

												<div class="col-xs-3">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-4 btn-flat" type="checkbox">
														<span class="lbl"></span>
													</label>
												</div>
											</div>
										</div>
									</div>

									<hr>
									<div class="row">
										<div class="col-sm-4">

										</div>

										<div class="col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">jQuery UI Sliders</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="row">
															<div class="col-xs-3 col-md-2">
																<div id="slider-range" class="ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" style="height: 200px;"><div class="ui-slider-range ui-widget-header ui-corner-all" style="bottom: 17%; height: 50%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="bottom: 17%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="bottom: 67%;"></span></div>
															</div>

															<div class="col-xs-9 col-md-10">
																<div id="slider-eq">
																	<span class="ui-slider-green ui-slider-small ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="width: 90%; float: left; margin: 15px;"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 77%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 77%;"></span></span>
																	<span class="ui-slider-red ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="width: 90%; float: left; margin: 15px;"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 55%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 55%;"></span></span>
																	<span class="ui-slider-purple ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all ui-state-disabled ui-slider-disabled" data-rel="tooltip" title="" data-original-title="Disabled!" style="width: 90%; float: left; margin: 15px;"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 33%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 33%;"></span></span>
																	<span class="ui-slider-simple ui-slider-orange ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="width: 90%; float: left; margin: 15px;"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 40%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 40%;"></span></span>
																	<span class="ui-slider-simple ui-slider-dark ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="width: 90%; float: left; margin: 15px;"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 88%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 88%;"></span></span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Spinners</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="ace-spinner middle" style="width: 125px;"><div class="input-group"><input type="text" id="spinner1" class="spinbox-input form-control text-center"><div class="spinbox-buttons input-group-btn btn-group-vertical">					<button type="button" class="btn spinbox-up btn-sm btn-info">						<i class="icon-only  ace-icon fa fa-chevron-up"></i>					</button>					<button type="button" class="btn spinbox-down btn-sm btn-info">						<i class="icon-only  ace-icon fa fa-chevron-down"></i>					</button>				</div></div></div>
														<div class="space-6"></div>

														<div class="ace-spinner middle touch-spinner" style="width: 140px;"><div class="input-group"><input type="text" class="input-sm spinbox-input form-control text-center" id="spinner2"><div class="spinbox-buttons input-group-btn">					<button type="button" class="btn spinbox-up btn-xs ">						<i class="icon-only  ace-icon ace-icon fa fa-caret-up bigger-110"></i>					</button>					<button type="button" class="btn spinbox-down btn-xs ">						<i class="icon-only  ace-icon ace-icon fa fa-caret-down bigger-110"></i>					</button>				</div></div></div>
														<div class="space-6"></div>

														<div class="ace-spinner middle touch-spinner" style="width: 125px;"><div class="input-group"><div class="spinbox-buttons input-group-btn">					<button type="button" class="btn spinbox-down btn-sm btn-danger">						<i class="icon-only  ace-icon ace-icon fa fa-minus bigger-110"></i>					</button>				</div><input type="text" id="spinner3" class="spinbox-input form-control text-center"><div class="spinbox-buttons input-group-btn">					<button type="button" class="btn spinbox-up btn-sm btn-success">						<i class="icon-only  ace-icon ace-icon fa fa-plus bigger-110"></i>					</button>				</div></div></div>
														<div class="space-6"></div>

														<div class="ace-spinner middle touch-spinner" style="width: 150px;"><div class="input-group"><div class="spinbox-buttons input-group-btn">					<button type="button" class="btn spinbox-down btn-lg btn-purple">						<i class="icon-only  ace-icon ace-icon fa fa-minus"></i>					</button>				</div><input type="text" class="input-lg spinbox-input form-control text-center" id="spinner4"><div class="spinbox-buttons input-group-btn">					<button type="button" class="btn spinbox-up btn-lg btn-purple">						<i class="icon-only  ace-icon ace-icon fa fa-plus"></i>					</button>				</div></div></div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<hr>
									<div class="row">
										<div class="col-sm-4">

										</div>

										<div class="col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">
														<i class="ace-icon fa fa-tint"></i>
														Color Picker
													</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="clearfix">
															<label for="colorpicker1">Color Picker</label>
														</div>

														<div class="control-group">
															<div class="bootstrap-colorpicker">
																<input id="colorpicker1" type="text" class="input-small colorpicker-element">
															</div>
														</div>

														<hr>

														<div>
															<label for="simple-colorpicker-1">Custom Color Picker</label>

															<select id="simple-colorpicker-1" class="hide">
																<option value="#ac725e">#ac725e</option>
																<option value="#d06b64">#d06b64</option>
																<option value="#f83a22">#f83a22</option>
																<option value="#fa573c">#fa573c</option>
																<option value="#ff7537">#ff7537</option>
																<option value="#ffad46" selected="">#ffad46</option>
																<option value="#42d692">#42d692</option>
																<option value="#16a765">#16a765</option>
																<option value="#7bd148">#7bd148</option>
																<option value="#b3dc6c">#b3dc6c</option>
																<option value="#fbe983">#fbe983</option>
																<option value="#fad165">#fad165</option>
																<option value="#92e1c0">#92e1c0</option>
																<option value="#9fe1e7">#9fe1e7</option>
																<option value="#9fc6e7">#9fc6e7</option>
																<option value="#4986e7">#4986e7</option>
																<option value="#9a9cff">#9a9cff</option>
																<option value="#b99aff">#b99aff</option>
																<option value="#c2c2c2">#c2c2c2</option>
																<option value="#cabdbf">#cabdbf</option>
																<option value="#cca6ac">#cca6ac</option>
																<option value="#f691b2">#f691b2</option>
																<option value="#cd74e6">#cd74e6</option>
																<option value="#a47ae2">#a47ae2</option>
																<option value="#555">#555</option>
															</select><div class="dropdown dropdown-colorpicker">		<a data-toggle="dropdown" class="dropdown-toggle" data-position="auto"><span class="btn-colorpicker" style="background-color:#ffad46"></span></a><ul class="dropdown-menu dropdown-caret"><li><a class="colorpick-btn" style="background-color:#ac725e;" data-color="#ac725e"></a></li><li><a class="colorpick-btn" style="background-color:#d06b64;" data-color="#d06b64"></a></li><li><a class="colorpick-btn" style="background-color:#f83a22;" data-color="#f83a22"></a></li><li><a class="colorpick-btn" style="background-color:#fa573c;" data-color="#fa573c"></a></li><li><a class="colorpick-btn" style="background-color:#ff7537;" data-color="#ff7537"></a></li><li><a class="colorpick-btn selected" style="background-color:#ffad46;" data-color="#ffad46"></a></li><li><a class="colorpick-btn" style="background-color:#42d692;" data-color="#42d692"></a></li><li><a class="colorpick-btn" style="background-color:#16a765;" data-color="#16a765"></a></li><li><a class="colorpick-btn" style="background-color:#7bd148;" data-color="#7bd148"></a></li><li><a class="colorpick-btn" style="background-color:#b3dc6c;" data-color="#b3dc6c"></a></li><li><a class="colorpick-btn" style="background-color:#fbe983;" data-color="#fbe983"></a></li><li><a class="colorpick-btn" style="background-color:#fad165;" data-color="#fad165"></a></li><li><a class="colorpick-btn" style="background-color:#92e1c0;" data-color="#92e1c0"></a></li><li><a class="colorpick-btn" style="background-color:#9fe1e7;" data-color="#9fe1e7"></a></li><li><a class="colorpick-btn" style="background-color:#9fc6e7;" data-color="#9fc6e7"></a></li><li><a class="colorpick-btn" style="background-color:#4986e7;" data-color="#4986e7"></a></li><li><a class="colorpick-btn" style="background-color:#9a9cff;" data-color="#9a9cff"></a></li><li><a class="colorpick-btn" style="background-color:#b99aff;" data-color="#b99aff"></a></li><li><a class="colorpick-btn" style="background-color:#c2c2c2;" data-color="#c2c2c2"></a></li><li><a class="colorpick-btn" style="background-color:#cabdbf;" data-color="#cabdbf"></a></li><li><a class="colorpick-btn" style="background-color:#cca6ac;" data-color="#cca6ac"></a></li><li><a class="colorpick-btn" style="background-color:#f691b2;" data-color="#f691b2"></a></li><li><a class="colorpick-btn" style="background-color:#cd74e6;" data-color="#cd74e6"></a></li><li><a class="colorpick-btn" style="background-color:#a47ae2;" data-color="#a47ae2"></a></li><li><a class="colorpick-btn" style="background-color:#555;" data-color="#555"></a></li></ul></div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">
														<i class="ace-icon fa fa-tachometer"></i>
														Knob Input
													</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="control-group">
															<div class="row">
																<div class="col-xs-6 center">
																	<div class="knob-container inline">
																		<div style="display:inline;width:80px;height:80px;"><canvas width="80" height="80"></canvas><input type="text" class="input-small knob" value="15" data-min="0" data-max="100" data-step="10" data-width="80" data-height="80" data-thickness=".2" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: -62px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 16px; line-height: normal; font-family: Arial; text-align: center; color: rgb(135, 206, 235); padding: 0px; -webkit-appearance: none;"></div>
																	</div>
																</div>

																<div class="col-xs-6  center">
																	<div class="knob-container inline">
																		<div style="display:inline;width:80px;height:80px;"><canvas width="80" height="80"></canvas><input type="text" class="input-small knob" value="41" data-min="0" data-max="100" data-width="80" data-height="80" data-thickness=".2" data-fgcolor="#87B87F" data-displayprevious="true" data-anglearc="250" data-angleoffset="-125" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: -62px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 16px; line-height: normal; font-family: Arial; text-align: center; color: rgb(135, 184, 127); padding: 0px; -webkit-appearance: none;"></div>
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-xs-12 center">
																	<div class="knob-container inline">
																		<div style="display:inline;width:150px;height:150px;"><canvas width="150" height="150"></canvas><input type="text" class="input-small knob" value="1" data-min="0" data-max="10" data-width="150" data-height="150" data-thickness=".2" data-fgcolor="#B8877F" data-angleoffset="90" data-cursor="true" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 37px; line-height: normal; font-family: Arial; text-align: center; color: rgb(184, 135, 127); padding: 0px; -webkit-appearance: none;"></div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>


								</div><!-- PAGE CONTENT ENDS -->




@endsection