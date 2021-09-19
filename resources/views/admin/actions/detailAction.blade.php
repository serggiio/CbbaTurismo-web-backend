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

    <title>Acciones</title>

    <style>
        
    </style>
  </head>
  <body>
    

@include('admin.partials.fixedMenu')

  <div class="main-content">
    @include('flash::message')
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
        
        <div class="card-title"><h2 style="color: rgb(88, 171, 219)"><i class="fas fa-list navIcon" style="font-size: 120%; color: rgb(88, 171, 219)"></i> {{ $action['created_at'] }}</h2></div>
        <hr>
        <div class="card-body">
            
          <div class="list-group" style="width: 50%; margin: auto;">
            <a type="button" href="{{ route('front.user.detail' , $action['userId'])}}" class="list-group-item list-group-item-action active">
              Usuario: {{ $action['user']['email'] . ' - ' . $action['user']['userType']['nameType'] }}
            </a>
            <a type="button" class="list-group-item list-group-item-action">Accion: {{ $action['actionName'] }}</a>
            <a type="button" class="list-group-item list-group-item-action">Estructura: {{ $action['table'] }}</a>
            <a type="button" class="list-group-item list-group-item-action">Ip {{ $action['ip'] }}</a>
            <p type="button" class="list-group-item list-group-item-action" disabled> 
              
              @if ($action['oldData'] && $action['oldData'] != '')
                <a type="button" data-toggle="collapse" href="#collapseOld" aria-expanded="false" aria-controls="collapseExample" class="list-group-item list-group-item-action" disabled><i class="fas fa-eye"></i>Ver antiguo </a>                
              @endif
              @if ($action['newData'] && $action['newData'] != '')
                <a type="button" data-toggle="collapse" href="#collapseNew" class="list-group-item list-group-item-action" disabled><i class="fas fa-eye"></i>Ver Nuevo </a>
              @endif
            </p>
            
          </div>
          <hr>

          <div class="row">
            <div class="col-md-6">
              <div class="collapse" id="collapseOld">
                <div class="card card-body">
                  <pre id="oldJson"></pre>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="collapse" id="collapseNew">
                <div class="card card-body">
                  <pre id="newJson"></pre>
                </div>
              </div>
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

  </body>

    <script>
      if('<?php echo $action['oldData']  ?>'){
        document.getElementById("oldJson").textContent = JSON.stringify(JSON.parse('<?php echo $action['oldData']  ?>'), undefined, 2);
      }

      if('<?php echo $action['newData']  ?>'){
        document.getElementById("newJson").textContent = JSON.stringify(JSON.parse('<?php echo $action['newData']  ?>'), undefined, 2);
      }
      $('.btn-expand-collapse').click(function(e) {
        $('.navbar-primary').toggleClass('collapsed');
        });

    </script>

</html>