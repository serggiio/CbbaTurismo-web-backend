<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('plugins/bootstrap-4.4.1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link href="{{ asset('css/newAdmin.css') }}" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>

    <title>Galería</title>

  </head>
  <body onload="changeId()">
    
  @include('admin.partials.fixedMenu')
  
  <div class="main-content">
    @include('flash::message')

    <div class="card shadow-lg p-3 mb-5 rounded" style="background-image: linear-gradient(to top, #d9f2bc, #bfe396, #a5d470, #8ac449, #6eb512);">
        
        <div class="card-title"><h2 style="color: white"><i class="fas fa-images navIcon" style="font-size: 120%; color: white"></i>  {{ $gallery['galleryName'] }}</h2></div>
        <hr>
        <a class="btn btn-success col-md-1" href="{{ route('front.placeDetail', $gallery['touristicPlaceId'])}}" role="button"><i class="fas fa-arrow-circle-left"></i></a>
        <div class="card-body">
            
            <div class="row">
                            
              <div class="col-md-1"></div>  
                <div class="col-md-8">

                    <form method="POST" action="{{ action('FrontController@createImage') }}" style="padding-top: 5%" enctype="multipart/form-data">
                        @csrf <!-- {{ csrf_field() }} -->
                        
                        <div class="form-group">
                          <label for="placeName" style="color: white">Creado: </label>
                          <input class="form-control" required readonly name="created_at" type="text" id="created_at" value="{{ $gallery['created_at'] }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="placeName" style="color: white">Nombre</label>                            
                            <input class="form-control" required name="galleryName" type="text" id="galleryName" value="{{ $gallery['galleryName'] }}">
                            <input hidden class="form-control" required name="galleryId" type="text" id="galleryId" value="{{ $gallery['galleryId'] }}">
                            
                        </div>
  
                        <div class="form-group">
                          <label for="files" style="color: white">Agregar imagenes: </label>
                          <input type="file" class="form-control" name="images[]" placeholder="address" multiple><br>
                          <button type="submit" class="btn btn-success col-md-2">Actualizar</button>
                        </div>
  
                    </form><br>
  
                    <div class="card" style="border-radius: 25px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2); background-image: linear-gradient(to top, #d9f2bc, #c0e597, #a7d771, #8dca49, #71bc10);">
                      <div class="card-body">
                        <h5 class="card-title" style="color: white">Imagenes: </h5>
                        
                        <div class="row">
                          @foreach ($gallery['images'] as $item)


                            <div class="col-md-4">
                                            

                              <div class="card">
                                  <div class="card-content">
                                    <img style="height: 300px" class="card-img-top img-fluid" src="{{ asset($gallery['galleryPath'] . '/' . $item['imagePath']) }}"
                                      alt="Card image cap" onerror="this.src='{{ asset('images/notFound.png') }}'">
                                    <div class="card-body" style="background-image: linear-gradient(to top, #d9f2bc, #bfe396, #a5d470, #8ac449, #6eb512);">
                                      <a href="{{route('admin.galleryImage.destroy', $item['imageId'])}}" onclick="deleteControl({{ $gallery['images'] }})" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                  </div>
                                </div>
                          </div>
                          @endforeach
                        </div>
                        
                      </div>
                    </div>
                  

                </div>                
                <div class="col-md-3">                    

                </div>
            </div>
            
        </div>

    </div>
    
   

  </div>


  </body>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="{{asset('plugins/jquery/js/jquery.js')}}"></script>
  <!-- Maps -->
  <script src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyAjvZCNzSUdg6g5jrOWYodqPLORdJdhsfM"></script>

  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <script>$('.btn-expand-collapse').click(function(e) {
        $('.navbar-primary').toggleClass('collapsed');
        });

        function changeId(){
          document.getElementsByClassName("close").className = "btn-close";
        }

    </script>


</html>