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
    @include('flash::message')
    <div class="row">
        <div class="col-md-3">
            <div class="card  bg-primary shadow-lg  bg-body rounded" >
                <div class="card-content">
                <a href="{{ route('front.newPlace')}}">
                    <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                        <i class="fas fa-plus-circle white font-large-2 float-left"></i>
                        </div>
                        <div class="media-body white text-center">
                        <h3>Nuevo</h3>
                        <span>Lugar turístico</span>
                        </div>
                    </div>
                    </div>
                </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card  bg-dark shadow-lg  bg-body rounded" >
                <div class="card-content">
                <a href="{{ route('front.reports')}}">
                    <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                        <i class="fas fa-file-pdf white font-large-2 float-left"></i>
                        </div>
                        <div class="media-body white text-center">
                        <h3>Reporte</h3>
                        <span>PDF turísmo</span>
                        </div>
                    </div>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
        
        <div class="card-title"><h2 style="color: green"><i class="fas fa-place-of-worship navIcon" style="font-size: 120%; color: green"></i>  Lugares turísticos</h2></div>
        <hr>
        <div class="card-body">
            
            <div class="row">
                <table class="table table-hover" id="listTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Provincia</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Puntuacion /5</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($places as $index => $place)
                            <tr>
                            
                                <th scope="row">{{$index+1}}</th>
                                <td>{{$place['placeName']}}</td>
                                <td>{{$place['provinceName']}}</td>
                                @if ($place['type'] == 'place')
                                    <td>Lugar</td>
                                @endif
                                @if ($place['type'] == 'event')
                                    <td>Evento</td>
                                @endif
                                    <td>{{$place['statusName']}}</td>
                                    <td>
                                    @php                          
                                        for($x = 0; $x <= $place['rateAvg']-1; $x++){
                                            echo '<i class="fas fa-star"></i>'; 
                                        }
                                    @endphp
                                    </td>
                                    <td>
                                        <a class="nav-link" href="{{ route('front.placeDetail', $place['touristicPlaceId'])}}" style="width: fit-content">   
                                        <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="nav-link" href="{{ route('admin.place.destroy', $place['touristicPlaceId'])}}" onclick="return confirm('Eliminar?')" style="width: fit-content">   
                                        <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

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

    <script src="{{asset('plugins/dataTable/dataTables.js')}}" defer></script>

    
  </body>

    <script>$('.btn-expand-collapse').click(function(e) {
        $('.navbar-primary').toggleClass('collapsed');
        });

        $(document).ready(function() {
            $('#listTable').DataTable( {
                "info":     false,
                
            } );

            //$('.paginate_button').addClass('btn btn-outline-success');
        } );
    </script>

</html>