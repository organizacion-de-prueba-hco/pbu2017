<div>
  <h2 class="StepTitle">IV. DATOS DE VIVIENDA</h2><hr>
    <!-- start user projects -->
  {!! Form::open(['method'=>'post','id'=>'elformulario4','class'=>'form-horizontal form-label-left']) !!}
   <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3" for="first-name">Vivienda</label>
      <div class="col-md-6 col-sm-9 col-xs-12">
          {!!Form::select('vivienda',$vivienda,$user->vivienda,['class'=>'form-control unidad'])!!}
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3" for="last-name">Material de construcción
      </label>
        <div class="col-md-6 col-sm-9 col-xs-12">
          {!!Form::select('material_vivienda',$material,$user->material_vivienda,['class'=>'form-control unidad'])!!}
        </div>
    </div>
    <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3">N° de Ambientes</label>
      <div class="col-md-6 col-sm-9 col-xs-12">
        {!!Form::text('n_ambientes', $user->n_ambientes, ['required','onkeypress'=>'return valida(event)','class'=> 'form-control', 'placeholder'=>'N°'])!!}
      </div>
    </div>
    <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3">Techo</label>
      <div class="col-md-6 col-sm-9 col-xs-12">
        {!!Form::select('techo_vivienda',$techo,$user->techo_vivienda,['class'=>'form-control unidad'])!!}
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3">Piso</label>
      <div class="col-md-6 col-sm-9 col-xs-12">
        {!!Form::select('piso_vivienda',$piso,$user->piso_vivienda,['class'=>'form-control unidad'])!!}
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3">Servicios básicos</label><br>
        <div class="col-md-6 col-sm-9 col-xs-12" style="font-size: 14px;">
          <label>                
            <input type="checkbox" name="servicio_luz" value="1"  class="ace"
              @if($user->servicio_luz=='1')
                checked="checked"
              @endif
            ><span class="lbl"> Luz</label></input><br>
          <label>                
            <input type="checkbox" name="servicio_agua" value="1" class="ace"
              @if($user->servicio_agua=='1')
                checked="checked"
              @endif
            ><span class="lbl"> Agua</span></input>
          </label><br>
          <label>
            <input type="checkbox" name="servicio_desague" value="1" class="ace"
              @if($user->servicio_desague=='1')
                checked="checked"
              @endif
            ><span class="lbl"> Desagüe</span></input><br>
          <label>
            <input type="checkbox" name="servicio_letrina" value="1" class="ace"
              @if($user->servicio_letrina=='1')
                checked="checked"
              @endif
            ><span class="lbl"> Letrinas</span></input><br>
          <label>
            <input type="checkbox" name="servicio_otros" value="1" class="ace"
              @if($user->servicio_otros=='1')
                 checked="checked"
              @endif
            ><span class="lbl"> Otros</label></input><br>
        </div>
    </div>
  <div class="hr hr-dotted"></div>
  <div align="center" ><br>
      <input type="hidden" name="elid" value="{{$user->id}}">
        <input type="submit" value="Actualizar" class="btn btn-info" onclick="lafuncion('/fichasocial/editardvivienda','#elformulario4','#step-44');"><br><br>
  </div>
  <div class="space-2"></div>
{!! Form::close() !!}
</div>