@extends('master.medico')
@section('activacion')
	<?php
	$i ='active';
	$ii='';
	$ii_i='';
	$ii_ii='';
	$ii_iii='';
	$ii_iv='';
	$ii_v='';
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
	?>
@endsection
@section('titulo','Expedientes')
@section('estilos')
<style type="text/css">
#nombre-titulo{
	font-family: 'Kaushan Script', cursive;
	font-size: 7em;
}
</style>
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-list-alt"></i>
	<li class="active">Encuestas</li>
</ul>
@endsection
@section('contenido')

<div class="container">
	<div class="row">
	<div class="col-sm-6 col-sm-offset-3 col-xs-12">
		<div align="right">
    		<h1 class=text-center id="nombre-titulo"> Centro Médico</h1>
    		<h3 style="margin-top: -10px; margin-bottom: -10px"><i>Buscar expediente...</i></h3>
    	</div><br><hr>
	</div>
   <div class="col-sm-6 col-sm-offset-3 col-xs-12">
    <div id="custom-search-input">
    {!! Form::open(['url' => 'meds/buscar', 'method' => 'GET']) !!}
                <div class="input-group col-md-12">
                	
                    <input type="text" class="form-control input-lg" name="cod"  placeholder="Ingresar DNI o Código Universitario" style="font-family:cursive; font-size: 1.5em;" maxlength="10" autofocus/>

                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                  
                </div> 
                {!!Form::close()!!} 
            </div>
    </div>
	</div>
</div>
<br><br>
@endsection
@section('script')
		<script type="text/javascript">
		//Para que salga las letritas negras del title
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
		</script>


@endsection