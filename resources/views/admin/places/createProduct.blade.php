<!-- Modal -->
<div class="modal fade" id="modalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="POST" action="{{ action('FrontController@createProduct') }}" style="padding-top: 5%" enctype="multipart/form-data">
          @csrf <!-- {{ csrf_field() }} -->

          <div class="form-group">
            <label for="productName">Nombre</label>
            <input class="form-control" required name="productName" type="text" id="images[]" required>
            <input class="form-control" required name="inputPlace" type="text" id="inputPlace" value="{{ $place }}" hidden>
          </div>

          <div class="form-group">
            <label for="productDescription">Descripcion</label>                            
            <input class="form-control" required name="productDescription" type="text" id="productDescription">                          
          </div>

          <label for="files">Selecciona una imagen:</label>
          <input class="form-control" id="image" type="file" name="image">

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Crear</button>
         </form>
      </div>
    </div>
  </div>
</div>