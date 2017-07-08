<?php 
use Carbon\Carbon;
Carbon::setLocale('es');

//Funcion formatear fecha AMiEstílo
  function FormFecha($texto,$tipo) {
    $fecha=Carbon::parse($texto);
                            switch ($fecha->format('m')) {
                                  case '01': $mes="Ene"; break;
                                  case '02': $mes="Feb"; break;
                                  case '03': $mes="Mar"; break;
                                  case '04': $mes="Abr"; break;
                                  case '05': $mes="May"; break;
                                  case '06': $mes="Jun"; break;
                                  case '07': $mes="Jul"; break;
                                  case '08': $mes="Ago"; break;
                                  case '09': $mes="Sep"; break;
                                  case '10': $mes="Oct"; break;
                                  case '11': $mes="Nov"; break;
                                  case '12': $mes="Dic"; break;
                                  default: $mes=""; break;
                            }
   $fechaFormateada= $fecha->format('d').' de '.$mes.' de '.$fecha->format('Y').' ~ '.$fecha->format('h:i:s A');
   switch ($tipo) {
      case 'todo': return $fechaFormateada; break;
      case 'mes': return $mes; break;
      default: return "Segundo argumento no válido"; break;
    }             
  
  }
?>
@extends('master.nutri')
@section('activacion')
  <?php
$oa = 'active';
$a  = '';
?>
@endsection
@section('titulo','Nuevo Informe')
@section('estilos')
<style type="text/css">

h2, h3{
  font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-weight: 800;
  color: #0085A1;
}

hr{
  max-width: 100%;
  margin: 2px;
  border-width: 1.5px;
  border-color: rgba(73,155,234,0.2);
}

.post-preview > a {
  color: #333333;
}
.post-preview > a:hover,
.post-preview > a:focus {
  text-decoration: none;
  color: #0085A1;
}
.post-title {
  font-size: 2.8em;
  margin-top: 30px;
  margin-bottom: 10px;
}
.post-subtitle {
  margin: 0;
  font-size: 2.5em;
  font-weight: 300;
  margin-bottom: 10px;
}
.post-meta {
  color: #777777;
  font-size: 1.1em;
  font-style: italic;
  margin-top: 0;
}
.post-preview > .post-meta > a {
  text-decoration: none;
  color: #333333;
}
.post-preview > .post-meta > a:hover,
.post-preview > .post-meta > a:focus {
  color: #0085A1;
  text-decoration: underline;
}

 #texto{
  font-size: 1.3em;
  color: black;
 }
 #tiempo{
  font-size: 0.8em;
  font-style: italic;
 }
 #img-res{
  text-align: right;
  box-shadow: 0 0 8px rgba(0, 0, 0, 1);
  border-radius: 100px;
 }


</style>

@endsection
@section('contenido')

<!--Cuerpo-->
<div class="col-md-12">
	<div class="x_panel">
	<!-- Main Content -->
    <div class="container">
        <div class="row">
        	<!-- -Xs pequeños móviles, sm moviles, md tablets y pcs, lg pcs grandes
        		 -offset-4 : desplazar 4 espacios, es como columna vacia -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            	
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 post-preview">
                        <h2 class="post-title" align="center">{{$foro->titulo}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{$foro->subtitulo}}
                        </h3>
                    <p class="post-meta">Publicado por <a href="#">{{$foro->user->nombres}}, {{$foro->user->apellido_paterno.' '.$foro->user->apellido_materno}}</a> el {{FormFecha($foro->created_at,"todo")}}</p>
                    <p class="post-meta">Última actualización {{FormFecha($foro->update_at,"todo")}}
                    @if(Auth::user()->tipo_user=='2-3' && Auth::user()->estado_login=='1')
                     (<a href="{{route('nutriforme.edit',$foro->id)}}">editar</a>)
                     @endif
                     </p>
                	<hr>
                </div>
                <!-- Imagen del foro -->
                @if($foro->archivo)
                  <a href="{{url('nutriformes/descargar',$foro->archivo)}}" target="_black">
                    <span class="label label-sm label-success"><i class="fa fa- fa-download bigger-110 white"></i>  Descargar evidencias
                    </span>
                  </a>
                @endif
                <!-- Texto/Contenido del foro -->
                <div><br>
                {!!$foro->contenido!!}
                </div>
                    
                </div>
            </div>
        </div>
    </div>	
    <!--Fin Main Content -->
    </div>
</div>
      
<!--Fin Respuestas/comentarios-->

    
@endsection
@section('script')
@endsection