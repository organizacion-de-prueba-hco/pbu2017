@extends('master.medico')
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
	$v_iii='';
	$iv_iii='';
	?>
@endsection
@section('titulo','Medicina-Atención')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-user-md"></i>
	<li class="active">Medicina</li>
	<li class="active">Atención</li>
</ul>
@endsection
@section('contenido')
<div class="row">
	<div class="col-xs-12">
		<div class="modal-body" align="center"><h2>Días de permiso</h2><br>
			{!! Form::open(['url' => 'medmeds/enf', 'method' => 'POST']) !!}
			<span class="input-icon">
				<input type="number" placeholder="Escribir aquí..." class="nav-search-input" maxlength="10" required="required" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="periodo" >
							<i class="ace-icon fa fa-calendar-plus-o nav-search-icon"></i>
			</span>
			<input type="hidden" name="medicina_id" value="{{$id}}">
			<button class="btn btn-success btn-sm btn-round submit">
				<i class="ace-icon fa fa-plus"></i>
			</button>
			{!!Form::close()!!}
			<br>
		</div>
	</div>
</div>


@endsection
@section('script')

@endsection