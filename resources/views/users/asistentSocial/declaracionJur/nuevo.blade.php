@extends('master.servicioSocial')
@section('activacion')
	<?php  
		$a=''; $b='active'; $c1=''; $c2='';$c='';$c3=''; $c4='';$d='';$d1=''; $d2=''; $d3=''; $d4='';$e='';
	?>
@endsection
@section('title','Declaración Jurada')
@section('estilos')
@endsection
@section('ruta')
<ul class="breadcrumb">
	<i class="ace-icon fa fa-comment"></i>	
	<li class="active">Declaración Jurada</li>
</ul>
@endsection
@section('contenido')

<div class="col-xs-12">
<h3 align="center">DECLARACIÓN JURADA</h3>
<p>Yo<input type="text" name="">identificado con DNI N° <input type="text" name="dni" id="name">
domiciliado en <input type="text" name=""> Urbanizacion <input type="text" name=""> Distrito<input type="text" name=""> Provincia<input type="text" name=""> Departamento<input type="text" name=""></p>
<br><br>
<p>En mi condición de padre(madre o apoderado) del Alumno(a) <input type="text" name="">
que cursa estudios universitarios en la Unheval E.A.P<input type="text" name=""> año <?php echo date("Y");?></p><br>
<h4>DECLARO BAJO JURAMENTO:</h4>
<p>Tener un trabajo independiente en el me desempeño  como <input type="text" name="">
percibiendo un haber mensual de S/.<input type="text" name=""> y teniendo una carga de <input type="text" name="">hijos menores en edad escolar, con lo que apoyo a mi hija en forma mensual con <input type="text" name=""> Para los gastos de alimentacion, alquiler de cuarto, más gastos de estudio.
</p><br>
<p>
Así mismo debo manifestar que tengo otros gastos como <input type="text" name="">
</p><br>
<p>
	En caso de falsedad me someto a las sanciones correspondientes a Ley.
</p><br>
<p>
	Huánuco.......de .....20..
</p><br><br>
<p>___________________________</p>
<p>DNI N° <input type="text" name=""></p>






</div>
@endsection