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
    <link rel="stylesheet" href="{{asset('plugins/trumbowig/ui/trumbowyg.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/chosen/chosen.css')}}">

    <title>Administrador</title>

    <style>
        
    </style>
  </head>
  <body>
    

@include('admin.partials.fixedMenu')

  <div class="main-content">
    @include('flash::message')
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
      <div class="card-title"><h2 style="color: green"><i class="fas fa-clipboard-list navIcon" style="font-size: 120%; color: green"></i> Solicitudes</h2></div>
      <hr>
      <div class="card-body">
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true">Cuentas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="tourism-tab" data-toggle="tab" href="#tourism" role="tab" aria-controls="tourism" aria-selected="false">Turismo</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <hr>
          <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">

            <div class="container" id="accordion">
              @foreach ($users as $user)
                <div class="card notice notice-lg">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="{{ '#collapse' . $user['userId'] }}" aria-expanded="false" aria-controls="{{ 'collapse' . $user['userId'] }}">
                        <strong>{{ $user['created_at'] . ' ' . $user['email'] }}</strong><br>
                      </button>
                      <p>Lugares turisticos asociados a la cuenta: {{ count($user['touristicPlace']) }}</p>
                    </h5>
                  </div>
                  <div id="{{ 'collapse' . $user['userId'] }}" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                      @foreach ($user['touristicPlace'] as $place)
                        <a href="{{ route('front.placeDetail', $place['touristicPlaceId'])}}">{{ $place['placeName']}}</a> <br> 
                          {{ $place['created_at'] }} <br>
                          <strong> {{ '    Estado: ' . $place['status']['statusName'] }} </strong>
                        <a class="nav-link btn btn-danger text-white" href="{{ route('admin.actionPlace.destroy', $place['touristicPlaceId'])}}" onclick="return confirm('Eliminar?')" style="width: fit-content">Eliminar</a>            
                        <hr>
                      @endforeach             
                    </div>
                    <a href="{{ route('front.actionApprove', $user['userId'])}}" class="btn btn-success text-white" role="button">Aprobar</a>                
                    <a href="{{ route('front.actionReject', $user['userId'])}}" onclick="return confirm('Descartar estos registros?')" class="btn btn-warning text-white" role="button">Descartar</a>
                  </div>
                </div>            
              @endforeach
            </div>

          </div>
          <div class="tab-pane fade" id="tourism" role="tabpanel" aria-labelledby="tourism-tab">

            <div class="row">
              @foreach ($places as $place)
                <div class="card notice notice-lg col-md-6">
                    <div class="card-body">                        
                        <a href="{{ route('front.placeDetail', $place['touristicPlaceId'])}}"><strong>{{ $place['created_at'] . ' ' . $place['placeName'] }}</strong></a> <br> 
                          {{ $place['created_at'] }} <br>
                          <strong> {{ '    Estado: ' . $place['status']['statusName'] }} </strong><br>
                          <strong> {{ '    Usuario: ' . $place['user']['email'] }} </strong><br>
                        <a class="btn btn-danger text-white" href="{{ route('admin.actionPlace.destroy', $place['touristicPlaceId'])}}" onclick="return confirm('Eliminar?')" style="width: fit-content">Eliminar</a>      
                        <a href="{{ route('front.actionPlaceApprove', $place['touristicPlaceId'])}}" class="btn btn-success text-white" role="button">Aprobar</a>                            
                    </div>
                </div>            
              @endforeach
            </div>
            

          </div>
        </div>
      </div>    

    </div>



    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
      <div class="card-title"><h2 style="color: green"><i class="fas fa-clipboard-list navIcon" style="font-size: 120%; color: green"></i>  Registro de acciones</h2></div>
      <hr>
      <div class="card-body">

        <div class="container">
          <div class="notice notice-lg">

              <table class="table table-hover" id="listTable">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Tipo</th>
                        <th>Accion</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($actions as $action)
                        <tr>
                            <td>{{$action['created_at']}}</td>
                            <td>{{$action['user']['email']}}</td>
                            <td>{{$action['user']['userType']['nameType']}}</td>
                            <td>{{$action['actionName']}}</td>
                            <td><a href="{{ route('front.action.detail' , $action['actionId'])}}"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
          </div>
        </div>


      </div>
    </div>
    

  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <script src="{{asset('plugins/jquery/js/jquery-3.3.1.js')}}"></script>    
  <script src="{{asset('plugins/trumbowig/trumbowyg.js')}}"></script>
  <script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>

  <!-- Maps -->
  <script src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyAjvZCNzSUdg6g5jrOWYodqPLORdJdhsfM"></script>


  <!-- Swiper JS -->
  <script src="{{ asset('plugins/swiper-master/package/js/swiper.min.js')}}"></script>
  <-- Import jQuery -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>

  <script src="{{asset('plugins/dataTable/dataTables.js')}}" defer></script>

    
  </body>

  <script>
    $(document).ready(function() {
      $('#listTable').DataTable( {
          "info":     false,
          
      } );

      //$('.paginate_button').addClass('btn btn-outline-success');
    } );
  </script>

 



</html>