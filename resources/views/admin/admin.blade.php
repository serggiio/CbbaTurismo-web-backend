<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    
    <link href="{{ asset('css/newAdmin.css') }}" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>

    <title>Administrador</title>

    <style>
        
    </style>
  </head>
  <body>
    

@include('admin.partials.fixedMenu')

  <div class="main-content">
    
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
        
        <div class="card-title"><h2 style="color: green"><i class="fas fa-home navIcon" style="font-size: 120%; color: green"></i>  Menu principal</h2></div>
        <hr>
        <div class="card-body">
            
            <div class="row">
                    
                  <div class="col-md-3">
                    <div class="card  bg-primary" >
                      <div class="card-content">
                        <a href="{{route('front.places')}}">
                          <div class="card-body">
                            <div class="media d-flex">
                              <div class="align-self-center">
                                <i class="icon-plane white font-large-2 float-left"></i>
                              </div>
                              <div class="media-body white text-right">
                                <h3>{{ count($places) }}</h3>
                                <span>Turismo</span>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="card  bg-success" >
                      <div class="card-content">
                        <a href="{{ route('front.users')}}">
                          <div class="card-body">
                            <div class="media d-flex">
                              <div class="align-self-center">
                                <i class="icon-users white font-large-2 float-left"></i>
                              </div>
                              <div class="media-body white text-right">
                                <h3>{{ count($users) }}</h3>
                                <span>Usuarios</span>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="card  bg-warning" >
                      <div class="card-content">
                        <a href="{{ route('front.tags')}}">
                          <div class="card-body">
                            <div class="media d-flex">
                              <div class="align-self-center">
                                <i class="icon-tag white font-large-2 float-left"></i>
                              </div>
                              <div class="media-body white text-right">
                                <h3>{{ count($tags) }}</h3>
                                <span>tags</span>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="card  bg-info" >
                      <div class="card-content">
                        <a href="{{ route('front.categories')}}">
                          <div class="card-body">
                            <div class="media d-flex">
                              <div class="align-self-center">
                                <i class="icon-pin white font-large-2 float-left"></i>
                              </div>
                              <div class="media-body white text-right">
                                <h3>{{ count($categories) }}</h3>
                                <span>Categorías</span>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                  

            </div>
            
        </div>

    </div>
    
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
        <div class="card-title"><h2 style="color: green"><i class="icon-star green font-large-2"></i>  Mejores 4 puntuaciones</h2></div>
        <hr>
        <div class="card-body">
            <div class="row">

              @foreach ($cardPlaces as $item)
              <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card">
                  <div class="card-content">
                    <img style="height: 300px" class="card-img-top img-fluid" src="{{ asset('images/places/' . $item->touristicPlaceId . '/' . $item->mainImage) }}"
                      alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title">{{ $item['placeName'] }}</h4>
                      <p class="card-text">                        
                        @php                          
                            for($x = 0; $x <= $item['rateAvg']-1; $x++){
                              echo '<i class="icon-star green" style="color: rgb(172, 172, 0)"></i>'; 
                            }
                        @endphp
                      </p>
                      <a href="{{ route('front.placeDetail', $item['touristicPlaceId'])}}" class="btn btn-outline-success">Editar</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

                

            </div>
        </div>

    </div>

  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="{{asset('plugins/jquery/js/jquery.js')}}"></script>
    <!-- Maps -->
    <script src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyAjvZCNzSUdg6g5jrOWYodqPLORdJdhsfM"></script>
  </body>

    <script>$('.btn-expand-collapse').click(function(e) {
        $('.navbar-primary').toggleClass('collapsed');
        });
    </script>

</html>