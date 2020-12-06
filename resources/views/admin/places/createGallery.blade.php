<!-- Modal -->
  <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nueva galeria de imagenes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="POST" action="{{ action('FrontController@createGallery') }}" style="padding-top: 5%" enctype="multipart/form-data">
            @csrf <!-- {{ csrf_field() }} -->

            <div class="form-group">
              <label for="galleryName">Nombre</label>
              <input class="form-control" required name="galleryName" type="text" id="images[]" required>
              <input class="form-control" required name="inputPlace" type="text" id="inputPlace" value="{{ $place }}" hidden>
            </div>

            <label for="files">Selecciona una o varias imagenes:</label>
            <input required type="file" class="form-control" name="images[]" placeholder="address" multiple>

           
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Crear</button>
         </form>
        </div>
      </div>
    </div>
  </div>