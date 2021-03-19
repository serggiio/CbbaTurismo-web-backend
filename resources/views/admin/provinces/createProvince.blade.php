<!-- Modal -->
<div class="modal fade" id="provinceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva provincia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form method="POST" action="{{ action('FrontController@createProvince') }}" style="padding-top: 5%" enctype="multipart/form-data">
          @csrf <!-- {{ csrf_field() }} -->



          <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10">
                <div class="form-group">
                    <label for="provinceName">Nombre</label>
                    <input class="form-control" required name="provinceName" type="text" id="provinceName" required>
                </div>
                  <br><br>
                  <div class="mapHolder" id="mapholder"></div><br>
                  <div class="form-group">
                      <input class="form-control" name="inputPlaceLatitude" type="text" id="inputPlaceLatitude" required>
                      <input class="form-control" name="inputPlaceLongitude" type="text" id="inputPlaceLongitude" required>
                  </div>
                  
              </div>
              <div class="col-md-1"></div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
    </div>
  </div>
</div>