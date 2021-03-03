
<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>@yield('Panel de control')</title>



<!-- Bootstrap core CSS -->
<link href="{{ asset('plugins/bootstrap-4.4.1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- Link Swipers CSS -->
<link rel="stylesheet" href="{{ asset('plugins/swiper-master/package/css/swiper.min.css')}}">
<!-- Link font awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

<meta name="theme-color" content="#563d7c">


<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  </head>

    <body class="">
    
        @include('admin.partials.panelFixed')


          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <div class="btn-toolbar mb-2 mb-md-0">
                @include('flash::message')   
              </div>
            </div>
            <a class="btn btn-light" href="{{ route('front.placeDetail', $gallery['touristicPlaceId'])}}" role="button"><i class="fas fa-arrow-circle-left"></i> Volver</a>

  
            <h2>Editar Galeria: </h2>
            

            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10">
                  <form method="POST" action="{{ action('FrontController@createImage') }}" style="padding-top: 5%" enctype="multipart/form-data">
                      @csrf <!-- {{ csrf_field() }} -->
                      
                      <div class="form-group">
                        <label for="placeName">Creado: </label>
                        <div class="col-md-7"><input class="form-control" required readonly name="created_at" type="text" id="created_at" value="{{ $gallery['created_at'] }}"></div>
                    </div>
                      
                      <div class="form-group">
                          <label for="placeName">Nombre</label>
                          
                          <div class="row">
                            <div class="col-md-7"><input class="form-control" required name="galleryName" type="text" id="galleryName" value="{{ $gallery['galleryName'] }}"></div>
                            <input hidden class="form-control" required name="galleryId" type="text" id="galleryId" value="{{ $gallery['galleryId'] }}">
                            
                          </div>
                          
                      </div>

                      <div class="form-group">
                        <label for="files">Agregar imagenes: </label>
                        <div class="col-md-7"><input type="file" class="form-control" name="images[]" placeholder="address" multiple><br></div>
                        <div class="col-md-7"><button type="submit" class="btn btn-primary col-md-2">Actualizar</button></div>
                      </div>

                  </form><br>

                  <div class="card" style="border-radius: 25px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);">
                    <div class="card-body">
                      <h5 class="card-title">Imagenes: </h5>
                      
                      <div class="row">
                        @foreach ($gallery['images'] as $item)
                          <div class="col-md-3 card">
                            <div class="card-body" style="height: 10%" style="border-radius: 25px;">
                              
                              <img width="100%" height="100%" src="{{ asset($gallery['galleryPath'] . '/' . $item['imagePath']) }}" class="">
                              
                            </div>
                            <div class="card-footer">
                              <a href="{{route('admin.galleryImage.destroy', $item['imageId'])}}" onclick="deleteControl({{ $gallery['images'] }})" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </div>
                          </div>
                        @endforeach
                      </div>
                      
                    </div>
                  </div>

              </div>
              <div class="col-md-1"></div>
          </div>

          <br><br><br>

          </main>



    </body>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- Swiper JS -->
  <script src="{{ asset('plugins/swiper-master/package/js/swiper.min.js')}}"></script>

  <script>
    function deleteControl(images){
      
      if(images.length == 1){
        console.log('solo UNO');
        alert('No puedes eliminar todas las imagenes de una galeria!');
      }else{
        return confirm('Eliminar esta imagen?');
      }
    }
  </script>

</html>
