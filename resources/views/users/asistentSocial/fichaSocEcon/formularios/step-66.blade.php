<div>
  <h2 class="StepTitle">VI. OPINÓN DE TRABAJADORA SOCIAL</h2>
  <br>
    <!-- start user projects -->
  
  {!! Form::open(['method'=>'post','id'=>'elformulario6','class'=>'form-horizontal form-label-left']) !!}   
    <div class="form-group">
      
      <div class="col-12">
      @if($fichasocial)
        <textarea id="opinion-texto" name="opinion" class="form-control" rows="5">{!!$fichasocial->opinion!!}</textarea> 
      @else
        <textarea id="opinion-texto" name="opinion" class="form-control" rows="5"></textarea>
      @endif
      </div>
    </div>
    
   
  <div class="hr hr-dotted"></div>
  <div align="center" ><br>
      <input type="hidden" name="user_id" value="{{$user->id}}">
        <input type="submit" value="Actualizar" class="btn btn-info" onclick="lafuncion('/fichasocial/opinion','#elformulario6','#step-66');"><br><br>
  </div>
  <div class="space-2"></div>
{!! Form::close() !!}
</div>