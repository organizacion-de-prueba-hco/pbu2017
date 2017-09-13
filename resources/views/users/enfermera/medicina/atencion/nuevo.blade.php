@extends('master.enfermera')
@section('activacion')
	<?php  
	$i ='';
	$ii='active open';
	$ii_i='active';
	$ii_ii='';
	$ii_iii='';
	$ii_iv='';
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
@section('title','Ficha Socio Económica')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-user-md"></i>
	<li class="active">Medicina</li>
	<li class="active">Atención</li>
	<li class="active">Nuevo</li>	
</ul>
@endsection
@section('contenido')
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="EditarIfamiliar"></div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="NuevoDsalud"></div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="EditarDatoSalud"></div>

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<div class="hr hr-18 hr-double dotted"></div>
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<h4 class="widget-title lighter">Datos del Estudiante</h4>
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
									<span class="title">TRIAJE</span>
								</li>
								
							</ul>
						</div>
						<hr />

						<div class="step-content pos-rel">
							<div class="step-pane active" data-step="1" id="step-11">
								@include('users.enfermera.inicio.vermas.step-11')
							</div>

							<div class="step-pane" data-step="2" id="step-22">
								@include('users.enfermera.inicio.vermas.step-22')
							</div>
							<div class="step-pane" data-step="3" id="step-33">
								@include('users.enfermera.inicio.vermas.step-triaje')
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
			
				$('[data-rel=tooltip]').tooltip();
			
				$('.select2').css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
			
			
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
						message: "<h3>¡Su información se ha guardado correctamente!</h3><br><i>para terminar recuerde presionar el botón azul \'Enviar datos\'</i>", 
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
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
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
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});
			})

//Formularios-------------------- step------------------------------
      function lafuncion($laruta,$elformulario,$eldiv){
        //console.log($($elformulario).serialize());
        var token=$("#token").val(); //El token solo en casos del tipo POST
        var route = $laruta; //Esta ruta dirige al store, y xq no se confunde con el index? x el POST y los datos que recibe
        //console.log("Encuesta:"+$('#encuesta').val()+" <> Pregunta:"+$('#pregunta').val());
        console.log($($elformulario).serialize());
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

    //Editar 
      function cargarModalCfamiliar(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        var route="/fichasocial/cfamiliar/"+id;
            //console.log(id);
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',
          success: function(result){
            //console.log(result);
            $('#cf_nombres').val(result.nombres);
            $('#cf_parentesco').val(result.parentesco);
            $('#cf_fecha_n').val(result.f_nac);
            $("#cf_instruccion option[value='"+ result.grado_instrucion +"']").attr("selected",true);
            // $("#e_estado option[value='"+ result.estado +"']").attr("selected",true);
            $('#cf_ocupacion').val(result.ocupacion);
            $('#cf_residencia').val(result.residencia);
            $('#cf_id').val(result.id);                 
          }                  
        });
      }    
      function cargarModaLtrabajosf(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        var route="/fichasocial/ltrabajosf/"+id;
            //console.log(id);
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',
          success: function(result){
            //console.log(result);
            $('#Ltrabajosf_id').val(result.id);
            $('#lugar_trabajo').val(result.lugar_trabajo);
            $('#trabajo_inicio').val(result.trabajo_inicio);
            $('#trabajo_fin').val(result.trabajo_fin);
            $('#Ltrabajosf_titulo').val(result.trabajo_fin);                 
          }                  
        });
      }
      function cargarModalIfamiliar(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        var route="/fichasocial/ingresofamiliar/"+id;
        //console.log('El id es: '+id);
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',
          success: function(result){
              $('#EditarIfamiliar').html(result);
          }                  
        });
     }
      function resetearModalIfamiliar($laruta,$modal,$eldiv){
        //console.log($laruta+$eldiv);
        var token=$("#token").val();
        var route = $laruta;
        $.ajax({
          data:  {'rutaModal':$modal},
          headers:{'X-CSRF-TOKEN':token}, 
          url:   route,
          type: 'post',
          beforeSend: function () {
            $($eldiv).html("Procesando, espere por favor...");
          },
          success:  function (response) {
            //console.log(response);
            $($eldiv).html(response);
          }
        });
      }
      //para el formulario 3.3 si es otro quien cubre los gastos
      function desc_cubre_gasto($ids){
    	var id=$ids;
    	$('#desc_cubre_gastos').val("");

    	if(id == '4'){
        	//$('#div-especifiquen').show();
        	 $('#div-especifiquen').removeClass('hidden');
      		
    	}else{
      		//$('#div-especifiquen').hide();
      		 $('#div-especifiquen').addClass('hidden');
    	}
  	  }
  	  function cargarNuevoDsalud($id){
        var route="/fichasocial/nuevodsalud/"+$id;
        
        $.ajax({
          url:route,
          success: function(result){ 
              $('#NuevoDsalud').html(result);
          }                  
        });
  	  }
  	  function editarDsalud($id){
        var route="/fichasocial/vistaeditardsalud/"+$id;
        $.ajax({
          url:route,
          success: function(result){ 
              $('#EditarDatoSalud').html(result);
          }                  
        });
  	  }
//FIN Formularios-------------------- step--------------------------

//Selects Anidados de departamentos-prov y Dist
  //Lugar de nacimiento
    $("#departamento_nac").change(event => {
      //Usaremos la ruta que creamos para los selects anidados en "Tutor"
      $.get(`/prov/${event.target.value}`,function(res,sta){
        $("#provincia_nac").empty();
        //console.log(res);
        $("#provincia_nac").append(`<option value=''>Provincia</option>`);
        res.forEach(element => {
          $("#provincia_nac").append(`<option value=${element.id}>${element.provincia}</option>`);
        });

      });
    });

    $("#provincia_nac").change(event => {
      $.get(`/dist/${event.target.value}`,function(res,sta){
        $("#distrito_nac").empty();
        //console.log(res);
        $("#distrito_nac").append(`<option value=''>Distrito</option>`);
        res.forEach(element => {
          $("#distrito_nac").append(`<option value=${element.id}>${element.distrito}</option>`);
        });

      });
    });
	//4to secundaria
    $("#iv_dep").change(event => {
      //Usaremos la ruta que creamos para los selects anidados en "Tutor"
      $.get(`/prov/${event.target.value}`,function(res,sta){
        $("#iv_prov").empty();
        //console.log(res);
        $("#iv_prov").append(`<option value=''>Provincia</option>`);
        res.forEach(element => {
          $("#iv_prov").append(`<option value=${element.id}>${element.provincia}</option>`);
        });

      });
    });

    $("#iv_prov").change(event => {
      $.get(`/dist/${event.target.value}`,function(res,sta){
        $("#iv_dist").empty();
        //console.log(res);
        $("#iv_dist").append(`<option value=''>Distrito</option>`);
        res.forEach(element => {
          $("#iv_dist").append(`<option value=${element.id}>${element.distrito}</option>`);
        });

      });
    });

    //4to secundaria
    $("#v_dep").change(event => {
      //Usaremos la ruta que creamos para los selects anidados en "Tutor"
      $.get(`/prov/${event.target.value}`,function(res,sta){
        $("#v_prov").empty();
        //console.log(res);
        $("#v_prov").append(`<option value=''>Provincia</option>`);
        res.forEach(element => {
          $("#v_prov").append(`<option value=${element.id}>${element.provincia}</option>`);
        });

      });
    });

    $("#v_prov").change(event => {
      $.get(`/dist/${event.target.value}`,function(res,sta){
        $("#v_dist").empty();
        //console.log(res);
        $("#v_dist").append(`<option value=''>Distrito</option>`);
        res.forEach(element => {
          $("#v_dist").append(`<option value=${element.id}>${element.distrito}</option>`);
        });

      });
    });

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
                      document.getElementById("lista").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
  	}      
      document.getElementById('files-foto').addEventListener('change', foto, false);

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