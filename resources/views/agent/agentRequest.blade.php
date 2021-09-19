<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('plugins/bootstrap-4.4.1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">    
    <link href="{{ asset('css/agent.css') }}" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>

    <link rel="stylesheet" href="{{asset('plugins/trumbowig/ui/trumbowyg.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/chosen/chosen.css')}}">
    <title>Página agente</title>

</head>
<body >
    @include('agent.partials.menu')

    <div class="main-content">
        @include('flash::message')
    
        <div class="row">
          <div class="col-md-2">
            <div class="card  bg-success" >
              <div class="card-content">
                <a href="{{ route('front.users')}}" data-bs-toggle="modal" data-bs-target="#requestModal">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="align-self-center">
                        <i class="fas fa-check-double white font-large-2 float-left"></i>
                      </div>
                      <div class="media-body white text-right">
                        <h3>Envia</h3>
                        <span>Una solicitud</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="card shadow-lg p-3 mb-5 rounded" style="">
        
            <div class="card-title"><h2><i class="fas fa-clipboard-list" style="font-size: 120%;"></i> Mis solicitudes</h2></div>
            <hr>
            <div class="card-body">
              <table class="table table-hover" id="listTable">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($places as $place)
                        <tr>
                            <td>{{$place['created_at']}}</td>
                            <td>{{$place['placeName']}}</td>
                            <td>Revision</td>
                            <td><a href="{{ route('agent.request.destroy' , $place['touristicPlaceId'])}}" onclick="return confirm('Eliminar?')"><i class="fas fa-trash"></i></a></td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
                       
            </div>
        </div>
        
       
    
    </div>
    @include('agent.partials.requestForm')
</body>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="{{asset('plugins/jquery/js/jquery.js')}}"></script>
<!-- Maps -->
<script src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyAjvZCNzSUdg6g5jrOWYodqPLORdJdhsfM"></script>


<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="{{asset('plugins/jquery/js/jquery-3.3.1.js')}}"></script>    
<script src="{{asset('plugins/trumbowig/trumbowyg.js')}}"></script>
<script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>


<!-- Swiper JS -->
<script src="{{ asset('plugins/swiper-master/package/js/swiper.min.js')}}"></script>
<!-- Import jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>

<script src="{{asset('plugins/dataTable/dataTables.js')}}" defer></script>


<script>
  $(document).ready(function() {
    $('#listTable').DataTable( {
        "info":     false,
        
    } );

    //$('.paginate_button').addClass('btn btn-outline-success');
  } );
</script>
</html>