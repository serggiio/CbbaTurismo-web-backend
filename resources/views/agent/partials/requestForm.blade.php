<div class="modal fade text-left" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header requestHeader">
    <h4 class="modal-title" id="myModalLabel1">Nueva solicitud</h4>
    </div>
    <div class="modal-body requestBody">      
    <p>El estado se registrara como en revision. <i class="fas fa-exclamation-circle"></i></p>
    <p>Un administrador revisara y aprobara la solicitud. <i class="fas fa-exclamation-circle"></i></p>
    <hr>
    <p>
      <form method="POST" action="{{ action('AgentController@agentRequest') }}" style="padding-top: 5%" enctype="multipart/form-data">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="form-group">            
          <div class="row">
            <div class="col-md-6">
              <label for="placeName" style="color: white;">Nombre del lugar turistico</label>
              <input type="text" class="form-control" id="placeName" name="placeName" placeholder="Ej. Restaurante...">
            </div>
            <div class="col-md-4">
              <label for="tag" style="color: white;">Selecciona un tipo</label>
              <select class="custom-select" id="inputTag" name="inputPlaceTags">
                @foreach ($tags as $tag)
                  <option value="{{$tag['tagId']}}">{{$tag['tagName']}}</option>    
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
    </p>
    </div>
  </div>
  </div>
</div>