<div>
  <h2 class="StepTitle">V. DATOS DE SALUD</h2>
  <h3 class="lighter block green">Indique si algún miembro de la familia padece de alguna enfermedad y que actualmente está en tratamiento especial y/o permanente (confidencial)</h3>
    <!-- start user projects -->
  <div class="table-responsive">
    <a href="#" data-toggle="modal" data-target="#NuevoDsalud" onclick="cargarNuevoDsalud('{{$user->id}}')" class="btn btn-success btn-xs">Agregar </a>
      <table class="data table table-hover no-margin">
        <thead>
          <tr>
            <th>Miembro de la familia</th>
            <th>Diagnóstico</th>
            <th>Seguro Médico</th>
            <th>Lugar donde se atiende</th>
          </tr>
        </thead>
        <tbody>
        @foreach($datoSalud as $ds)
          <tr  data-toggle="modal" data-target="#EditarDatoSalud" onclick="editarDsalud('{{$ds->id}}')">
                <td>{{$ds->parentesco}}: {{$ds->nombresp}}</td>
                <td>{{$ds->diagnostico}}</td>
                <td>{{$ds->seguro_medico}}</td>
                <td>{{$ds->lugar_atencion}}</td>
          </tr>
        @endforeach    
        </tbody>
      </table>
  </div><hr>

  {!! Form::open(['method'=>'post','id'=>'elformulario5','class'=>'form-horizontal form-label-left']) !!}   
    <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3">Registro de discapacitado N°</label>
      <div class="col-md-6 col-sm-9 col-xs-12">
        {!!Form::text('registro_discapacitado', $user->registro_discapacitado, ['required','class'=> 'form-control', 'placeholder'=>'Escribir aquí...'])!!}
      </div>
    </div>
    <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3">Registro de Victimas de Terrorismo</label>
      <div class="col-md-6 col-sm-9 col-xs-12">
        {!!Form::text('registros_terrorismo', $user->registros_terrorismo, ['required','onkeypress'=>'return valida(event)','class'=> 'form-control', 'placeholder'=>'Escribir aquí...'])!!}
      </div>
    </div>
   
  <div class="hr hr-dotted"></div>
  <div align="center" ><br>
      <input type="hidden" name="elid" value="{{$user->id}}">
        <input type="submit" value="Actualizar" class="btn btn-info" onclick="lafuncion('/fichasocial/otrosdatossalud','#elformulario5','#step-55');"><br><br>
  </div>
  <div class="space-2"></div>
{!! Form::close() !!}
</div>