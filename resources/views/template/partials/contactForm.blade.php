<div class="modal fade text-left" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header contactHeader">
      <h4 class="modal-title" id="myModalLabel1">Informacion de contacto</h4>
      </div>
      <div class="modal-body contactBody">      
      <p>Ingresa los datos de tu negocio o contacto.</p>
      <p>Una vez revisada la informacion nos pondremos en contacto para completar el registro.</p>
      <hr>
      <p>
        <form method="POST" action="{{ action('AgentController@agentContact') }}" style="padding-top: 5%" enctype="multipart/form-data">
          @csrf <!-- {{ csrf_field() }} -->
          <div class="form-group">
            <label for="email" style="color: white;">Correo electronico</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" required>
          </div>

          <div class="form-group">
            <label for="phoneNumber" style="color: white;">Telefono de contacto</label>
            <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Número" required>
          </div>

          <p>Solo en caso de registrar un negocio: </p>
          <hr>
          <div class="form-group">            
            <div class="row">
              <div class="col-md-6">
                <label for="placeName" style="color: white;">Nombre del negocio</label>
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
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </p>
      </div>
    </div>
    </div>
</div>