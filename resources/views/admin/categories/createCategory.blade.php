<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="galleryModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nueva categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
  
            <form method="POST" action="{{ action('FrontController@createCategory') }}" style="padding-top: 5%" enctype="multipart/form-data">
              @csrf <!-- {{ csrf_field() }} -->
  

  
              <div class="row">
                
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="form-group">
                        <label for="categoryName">Nombre</label>
                        <input class="form-control" required name="categoryName" type="text" id="categoryName" required>
                    </div>

                    <div class="form-group">
                        
                    </div>   

                    <label for="inputPlaceTags">Tag</label><br>
                    <select class="form-control select-tag" required="required" name="inputPlaceTag" id="selectTags" style="">
                        @foreach($tags as $tag)
                            <option value="{{$tag['tagId']}}">{{$tag['tagName']}}</option>
                        @endforeach
                    </select> 
                                
                      
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