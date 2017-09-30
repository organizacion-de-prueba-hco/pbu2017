@extends('master.odontologo')
@section('activacion')
	<?php  
	$i ='';
	$ii='active';
	$iii='';
	$iii_i='';
	$iii_ii='';
	$iv='';
	$iv_i='';
	$iv_ii='';
	$v='';
	$v_i='';
	$v_ii='';
		use Carbon\Carbon;
		Carbon::setLocale('es');
	?>
@endsection
@section('titulo','Ficha Socio Económica')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-home"></i>	
	<li class="active">Atención</li>
	<li class="active">Nuevo</li>	
</ul>
@endsection
@section('contenido')

<!-- Actualizar Procedimiento -->
<div class="modal fade bs-example-modal-sm" tabindex="" role="dialog" aria-hidden="true" id="aprocedimientos">
   <div class="modal-dialog">
      <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Actualizar Procedimento</h4>
      </div>

         {!! Form::open(['method'=>'post','id'=>'modal-aprocedimiento','class'=>'form-horizontal form-label-left']) !!}
            <div class="modal-body">
	            <div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Cantidad</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="number" min="1" class="col-xs-12 col-sm-6" name="cantidad" id="c_cantidad" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Procedimiento</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix" align="left">
								{!!Form::select('procedimiento_id',$procedimientos,null,['required', 'id'=>'c_procedimiento_id','class'=>'col-xs-12 col-sm-9','style'=>'width: 100%'])!!}
							</div>
						</div>
					</div>         
            </div>
               <div class="modal-footer">
               	<div class="form-group">
							<div class="col-xs-12 col-sm-12">
		            	<input type="hidden" name="user_id" value="{{$estudiante->user_id}}">
		            	<input type="hidden" name="id" id="c_id" value="">
		            	<input type="button" class="btn btn-danger" value="Eliminar" data-dismiss="modal" onclick="lafuncion('/odontodontos/eprocedimientos','#modal-aprocedimiento','#div-de-tablas');">
		            	<input type="button" class="btn btn-success" value="Actualizar" data-dismiss="modal" onclick="lafuncion('/odontodontos/aprocedimientos','#modal-aprocedimiento','#div-de-tablas')">
		            	</div>
		         	</div>
               </div>
         {!! Form::close() !!}
      </div>
   </div>
</div>
<!--Fin de Actualizar procedimiento-->

<!--Modal Nuevo Procedimiento-->
<div id="procedimientos" class="modal fade bs-example-modal-sm" tabindex="" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h3 class="smaller lighter blue no-margin">Registrar Nuevo Procedimiento</h3>
			</div>

			<div class="modal-body" align="center">
				{!! Form::open(['method'=>'post','id'=>'modal-procedimientos','class'=>'form-horizontal form-label-left']) !!}
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Cantidad</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="number" min="1" class="col-xs-12 col-sm-6" name="cantidad" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Procedimiento</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix" align="left">
								{!!Form::select('procedimiento_id',$procedimientos,null,['required', 'id'=>'procedimiento_id','class'=>'col-xs-12 col-sm-9','style'=>'width: 100%'])!!}
							</div>
						</div>
					</div>
			</div>
					<div class="modal-footer">
               	<div class="form-group">
							<div class="col-xs-12 col-sm-12">
		            	<input type="hidden" name="odontologia_id" value="{{$medicina->id}}">
		            	<input type="hidden" name="user_id" value="{{$estudiante->user_id}}">
		            	<input type="button" class="btn btn-success" value="Agregar" data-dismiss="modal" onclick="lafuncion('/odontodontos/procedimientos','#modal-procedimientos','#div-de-tablas')">
		            	</div>
		         	</div>
		         </div>
				{!!Form::close()!!}
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--Fin modal Nuevo-->

<!--Modal Actualizar Medicamentos-->
<div id="amedicamentos" class="modal fade bs-example-modal-sm" tabindex="" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h3 class="smaller lighter blue no-margin">Actualizar Medicamento</h3>
			</div>

			<div class="modal-body" align="center">
				{!! Form::open(['method'=>'post','id'=>'modal-amedicamentos','class'=>'form-horizontal form-label-left']) !!}
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Cantidad</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="number" min="1" class="col-xs-12 col-sm-6" name="cantidad" id="m_cantidad" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Medicamento</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix" align="left">
								<select name="medicamento_id" id="m_medicamento_id" class='col-xs-12 col-sm-9' style='width: 100%;'>
									@foreach($medicamentos as $m)
									<option value="{{$m->id}}">{{$m->medicamento.' - '.$m->presentacion}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Indicaciones</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="col-xs-12 col-sm-6" name="indicaciones" id="m_indicaciones" style='width: 100%;'/>
							</div>
						</div>
					</div>
			</div>
					<div class="modal-footer">
               	<div class="form-group">
							<div class="col-xs-12 col-sm-12">
		            	<input type="hidden" name="user_id" value="{{$estudiante->user_id}}">
		            	<input type="hidden" name="m_id"  id="m_id">
		            	
		            	<input type="button" class="btn btn-danger" value="Eliminar" data-dismiss="modal" onclick="lafuncion('/odontodontos/emedicamentos','#modal-amedicamentos','#div-de-tablas');">
		            	<input type="button" class="btn btn-success" value="Actualizar" data-dismiss="modal" onclick="lafuncion('/odontodontos/amedicamentos','#modal-amedicamentos','#div-de-tablas')">
		            	</div>
		         	</div>
		         </div>
				{!!Form::close()!!}
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--Fin Actualizar Medicamento-->

<!--Modal Nuevo Medicamento-->
<div id="medicamentos" class="modal fade bs-example-modal-sm" tabindex="" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h3 class="smaller lighter blue no-margin">Registrar Nuevo Medicamento</h3>
			</div>

			<div class="modal-body" align="center">
				{!! Form::open(['method'=>'post','id'=>'modal-medicamentos','class'=>'form-horizontal form-label-left']) !!}
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Cantidad</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="number" min="1" class="col-xs-12 col-sm-6" name="cantidad" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Medicamento</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix" align="left">
								<select name="medicamento_id" id="medicamento_id" class='col-xs-12 col-sm-9' style='width: 100%;'>
									@foreach($medicamentos as $m)
									<option value="{{$m->id}}">{{$m->medicamento.' - '.$m->presentacion}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Indicaciones</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" min="1" class="col-xs-12 col-sm-6" name="indicaciones" style='width: 100%;'/>
							</div>
						</div>
					</div>
			</div>
					<div class="modal-footer">
               	<div class="form-group">
							<div class="col-xs-12 col-sm-12">
		            	<input type="hidden" name="odontologia_id" value="{{$medicina->id}}">
		            	<input type="hidden" name="user_id" value="{{$estudiante->user_id}}">
		            	<input type="button" class="btn btn-success" value="Agregar" data-dismiss="modal" onclick="lafuncion('/odontodontos/medicamentos','#modal-medicamentos','#div-de-tablas')">
		            	</div>
		         	</div>
		         </div>
				{!!Form::close()!!}
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--Fin Nuevo Medicamento-->

<!-- Actualizar Atencion -->
<div class="modal fade bs-example-modal-sm" tabindex="" role="dialog" aria-hidden="true" id="aatenciones">
   <div class="modal-dialog">
      <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Actualizar Atención</h4>
      </div>
      <div class="modal-body" align="center">
         {!! Form::open(['method'=>'post','id'=>'modal-aatencion','class'=>'form-horizontal form-label-left']) !!}
            <div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Procedimiento</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix" align="left">
								{!!Form::select('procedimiento_id',$procedimientos,null,['required', 'id'=>'a_atencion_id','class'=>'col-xs-12 col-sm-9','style'=>'width: 100%'])!!}
							</div>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Observación</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="col-xs-12 col-sm-6" name="obs" id="a_obs"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Próxima Cita</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="date" class="col-xs-12 col-sm-6" name="prox_cita" id="a_prox_cita" />
							</div>
						</div>
					</div>
		</div>
               <div class="modal-footer">
               	<div class="form-group">
							<div class="col-xs-12 col-sm-12">
		            	<input type="hidden" name="user_id" value="{{$estudiante->user_id}}">
		            	<input type="hidden" name="id" id="a_id" value="">
		            	<input type="button" class="btn btn-danger" value="Eliminar" data-dismiss="modal" onclick="lafuncion('/odontodontos/eatenciones','#modal-aatencion','#div-de-tablas');">
		            	<input type="button" class="btn btn-success" value="Actualizar" data-dismiss="modal" onclick="lafuncion('/odontodontos/aatenciones','#modal-aatencion','#div-de-tablas')">
		            	</div>
		         	</div>
               </div>
         {!! Form::close() !!}
      </div>
   </div>
</div>
<!--Fin de Actualizar atención-->

<!--Modal Nueva atención-->
<div id="atenciones" class="modal fade bs-example-modal-sm" tabindex="" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h3 class="smaller lighter blue no-margin">Registrar Nueva Atención</h3>
			</div>

			<div class="modal-body" align="center">
				{!! Form::open(['method'=>'post','id'=>'modal-atenciones','class'=>'form-horizontal form-label-left']) !!}
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Procedimiento</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix" align="left">
								{!!Form::select('procedimiento_id',$procedimientos,null,['required', 'id'=>'atencion_id','class'=>'col-xs-12 col-sm-9','style'=>'width: 100%'])!!}
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Observación</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" class="col-xs-12 col-sm-6" name="obs" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right">Próxima Cita</label>
						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="date" class="col-xs-12 col-sm-6" name="prox_cita" />
							</div>
						</div>
					</div>
			</div>
					<div class="modal-footer">
               	<div class="form-group">
							<div class="col-xs-12 col-sm-12">
		            	<input type="hidden" name="odontologia_id" value="{{$medicina->id}}">
		            	<input type="hidden" name="user_id" value="{{$estudiante->user_id}}">
		            	<input type="button" class="btn btn-success" value="Agregar" data-dismiss="modal" onclick="lafuncion('/odontodontos/atenciones','#modal-atenciones','#div-de-tablas')">
		            	</div>
		         	</div>
		         </div>
				{!!Form::close()!!}
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--Fin modal Nuevo-->


<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<div class="hr hr-18 hr-double dotted"></div>
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<h4 class="widget-title lighter">Código: {{$medicina->id}}</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div id="fuelux-wizard-container">
						<div>
							<ul class="steps">
								<li data-step="1" class="active">
									<span class="step">I</span>
									<span class="title">FILIACIÓN</span>
								</li>
								<li data-step="2">
									<span class="step">II</span>
									<span class="title">ANTECEDENTES</span>
								</li>
								<li data-step="3">
									<span class="step">III</span>
									<span class="title">ODONTOLOGÍA</span>
								</li>								
							</ul>
						</div>
						<hr />

						<div class="step-content pos-rel">
							<div class="step-pane active" data-step="1" id="step-11">
								@include('users.odontologo.inicio.vermas.step-11')
							</div>
							<div class="step-pane" data-step="2" id="step-22">
								@include('users.odontologo.inicio.vermas.step-22')
							</div>
							<div class="step-pane" data-step="3" id="step-33">
								@include('users.odontologo.odontologia.verMas.step-33')
							</div>
							
						</div>
					</div>
					<hr />
					<div class="wizard-actions">
						<button class="btn btn-prev">
							<i class="ace-icon fa fa-arrow-left"></i>
							Anterior
						</button>
						<button class="btn btn-success btn-next" data-last="Finalizar">
							Siguiente
							<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
						</button>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('script')
		{!!Html::script('assets/js/wizard.min.js')!!}
		{!!Html::script('assets/js/jquery.validate.min.js')!!}
		{!!Html::script('assets/js/jquery-additional-methods.min.js')!!}
		{!!Html::script('assets/js/bootbox.js')!!}
		{!!Html::script('assets/js/jquery.maskedinput.min.js')!!}
		{!!Html::script('assets/js/select2.min.js')!!}


		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('#procedimiento_id').select2({});
				$('#c_procedimiento_id').select2({});
				$('#medicamento_id').select2({});
				$('#m_medicamento_id').select2({});
				$('#atencion_id').select2({});
				$('#a_atencion_id').select2({});
				$('[data-rel=tooltip]').tooltip();
			
							
			
				var $validation = false;
				$('#fuelux-wizard-container')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step "2" at first
					//buttons: '.wizard-actions:eq(0)'
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
					bootbox.dialog({
						message: "<h3>¡Ya casi ha terminado!</h3><br><i>para terminar recuerde presionar el botón azul \'Enviar datos\'</i>", 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary",
								 callback: function() {
                					//alert('Holaaa');
            					 }
							}
						}
					});
				}).on('stepclick.fu.wizard', function(e){
					//e.preventDefault();//this will prevent clicking and selecting steps
				});
			
			
				//jump to a step
				/**
				var wizard = $('#fuelux-wizard-container').data('fu.wizard')
				wizard.currentStep = 3;
				wizard.setState();
				*/
			
				//determine selected step
				//wizard.selectedItem().step
			
			
			
				//hide or show the other form which requires validation
				//this is for demo only, you usullay want just one form in your application
				$('#skip-validation').removeAttr('checked').on('click', function(){
					$validation = this.checked;
					if(this.checked) {
						$('#sample-form').hide();
						$('#validation-form').removeClass('hide');
					}
					else {
						$('#validation-form').addClass('hide');
						$('#sample-form').show();
					}
				})
			
			
			
				//documentation : http://docs.jquery.com/Plugins/Validation/validate
			
			
				$.mask.definitions['~']='[+-]';
				$('#phone').mask('(999) 999-9999');
			
				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");
			
				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						email: {
							required: true,
							email:true
						},
						password: {
							required: true,
							minlength: 5
						},
						password2: {
							required: true,
							minlength: 5,
							equalTo: "#password"
						},
						name: {
							required: true
						},
						phone: {
							required: true,
							phone: 'required'
						},
						url: {
							required: true,
							url: true
						},
						comment: {
							required: true
						},
						state: {
							required: true
						},
						platform: {
							required: true
						},
						subscription: {
							required: true
						},
						gender: {
							required: true,
						},
						agree: {
							required: true,
						}
					},
			
					messages: {
						email: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						password: {
							required: "Please specify a password.",
							minlength: "Please specify a secure password."
						},
						state: "Please choose state",
						subscription: "Please choose at least one option",
						gender: "Please choose gender",
						agree: "Please accept our policy"
					},
			
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else error.insertAfter(element.parent());
					},
			
					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});
			
				
				
				
				$('#modal-wizard-container').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
				
				
				/**
				$('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				
				$('#mychosen').chosen().on('change', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				*/
			})

//Formularios-------------------- step------------------------------
      function lafuncion($laruta,$elformulario,$eldiv){
        //console.log($($elformulario).serialize());
        var token=$("#token").val(); //El token solo en casos del tipo POST
        var route = $laruta; //Esta ruta dirige al store, y xq no se confunde con el index? x el POST y los datos que recibe
        //console.log("Encuesta:"+$('#encuesta').val()+" <> Pregunta:"+$('#pregunta').val());
        $.ajax({
          headers:{'X-CSRF-TOKEN':token}, 
          data:  $($elformulario).serialize(),
          url:   route,
          type: 'post',
          beforeSend: function () {
          $($eldiv).html("<img src=\"{{URL::to('imagenes/cargar_2.gif')}}\" alt=\"Procesando, espere por favor...\" width=\"70%\">");

          },
          success:  function (response) {
            //console.log(response);
            $($eldiv).html(response);
          }
        });
      }

       
//FIN Formularios-------------------- step--------------------------
		function cargarProcedimientos(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        var route="/odontodontos/cprocedimientos/"+id;
           //console.log(id);
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',
          success: function(result){
           //console.log(result.procedimiento_id);
          $('#c_cantidad').val(result.cantidad);
          $("#c_procedimiento_id option[value='"+ result.procedimiento_id +"']").attr("selected",true);
          $('#c_id').val(id);                 
          }                  
        });
      }
      
      function cargarMedicamentos(ids){
        //console.log(ids);
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        var route="/odontodontos/cmedicamentos/"+id;
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',
          success: function(result){
           //console.log(result);
          $('#m_cantidad').val(result.cantidad);
          $("#m_medicamento_id option[value='"+ result.medicamento_id +"']").attr("selected",true);
          $('#m_id').val(result.id); 
          $('#m_indicaciones').val(result.indicaciones);                 
          }                  
        });
      }

      function cargarAtenciones(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        var route="/odontodontos/catenciones/"+id;
           //console.log(id);
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',
          success: function(result){
           //console.log(result);
          $('#a_obs').val(result.obs);
          $("#a_atencion_id option[value='"+ result.procedimiento_id +"']").attr("selected",true);
          $('#a_prox_cita').val(result.prox_cita);
          $('#a_id').val(id);                 
          }                  
        });
      }


      //Mostrar ocultar P_Otros
    function mostrarotros($id,$check){
    	var elementId=$id;
    	var checkbox=$check;
    	//console.log(elementId+checkbox);
    	if ($(checkbox).prop('checked')) {
          	document.getElementById(elementId).style.visibility='visible';

        }
        else {
          	$('#'+elementId).val('');
           	document.getElementById(elementId).style.visibility='hidden';
        }
    }

</script>

@endsection