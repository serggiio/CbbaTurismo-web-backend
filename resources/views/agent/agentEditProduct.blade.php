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

    <title>Producto</title>

  </head>
  <body onload="changeId()">
    
  @include('agent.partials.menu')
  
  <div class="main-content">
    @include('flash::message')

    <div class="card shadow-lg p-3 mb-5 rounded">
        
        <div class="card-title"><h2><i class="fas fa-utensils navIcon" style="font-size: 120%;"></i>  {{ $product['productName'] }}</h2></div>
        <hr>
        <a class="btn btn-success col-md-1" href="{{ route('frontAgent.placeDetail', $product['touristicPlaceId'])}}" role="button"><i class="fas fa-arrow-circle-left"></i></a>
        <div class="card-body">
            
            <div class="row">
                            
              <div class="col-md-1"></div>  
                <div class="col-md-8">

                    <form method="POST" action="{{ action('AgentController@storeUpdatedProduct') }}" style="padding-top: 5%" enctype="multipart/form-data">
                        @csrf <!-- {{ csrf_field() }} -->
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <div class="form-group">
                          <label for="placeName">Creado: </label>
                          <input class="form-control" required readonly name="created_at" type="text" id="created_at" value="{{ $product['created_at'] }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="placeName">Nombre</label>                            
                            <input class="form-control" required name="productName" type="text" id="productName" value="{{ $product['productName'] }}">
                            <input hidden class="form-control" required name="productId" type="text" id="productId" value="{{ $product['productId'] }}">
                            
                        </div>

                        <div class="form-group">
                          <label for="placeName">Descripcion</label>                            
                          <input class="form-control" required name="productDescription" type="text" id="productDescription" value="{{ $product['productDescription'] }}">                          
                        </div>
  
                        <div class="form-group">
                          <label for="mainImage">Cambiar imagen</label>
                          <input class="form-control" id="image" type="file" name="image"><br>
                        </div>
  
                    </form><br>
  
                    <div class="card">
                      <div class="card-body">  
                        <div class="card">
                            <img src="{{ asset('images/places/' . $product->touristicPlaceId . '/products/' . $product->productIcon) }}" height="210px" width="100%">                              
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