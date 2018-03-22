@extends('master.enfermera')
@section('activacion')
	<?php  
	$i ='active';
	$ii='';
	$ii_i='';
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
	$v_iii='';
	$iv_iii='';
	$vi='';
		use Carbon\Carbon;
		Carbon::setLocale('es');
	?>
@endsection
@section('titulo','Inicio')
@section('estilos')
	<style type="text/css">
             .thumb{
               border: 1px solid #000;
               margin: 10px 5px 0 0;
               width: 100%;
               text-align: center;
            }

   </style>
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-home"></i>	
	<li class="active">Inicio</li>
	<li class="active">Buscar Estudiante</li>	
</ul>
@endsection
@section('contenido')

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<div class="hr hr-18 hr-double dotted"></div>
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<h4 class="widget-title lighter">Datos del paciente</h4>
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
									<span class="title">MEDICINA</span>
								</li>
								<li data-step="4">
									<span class="step">IV</span>
									<span class="title">ODONTOLOGÍA</span>
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
								@include('users.enfermera.inicio.vermas.step-medicina')
							</div>
							<div class="step-pane" data-step="4" id="step-44">
								@include('users.enfermera.inicio.vermas.step-odontologia')
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
			
				
				$('#fuelux-wizard-container').ace_wizard();
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