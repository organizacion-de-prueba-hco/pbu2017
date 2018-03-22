@extends('master.enfermera')
@section('activacion')
	<?php  
	$i ='';
	$ii='';
	$ii_i='';
	$ii_ii='';
	$ii_iii='';
	$ii_iv='';
	$iii='active open';
	$iii_i='active';
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
@section('titulo','Nuevo')
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
									<span class="title">SALUD GENERAL</span>
								</li>
								
							</ul>
						</div>
						<hr />

						<div class="step-content pos-rel">
							<div class="step-pane active" data-step="1" id="step-11">
								@include('users.enfermera.odontologia.atencion.nuevo.step-11')
							</div>

							<div class="step-pane" data-step="2" id="step-22">
								@include('users.enfermera.odontologia.atencion.nuevo.step-22')
							</div>
							<div class="step-pane" data-step="3" id="step-33">
								@include('users.enfermera.odontologia.atencion.nuevo.step-33')
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
                      document.getElementById("lista-e").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
  	}      
      document.getElementById('files-foto-e').addEventListener('change', foto, false);

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