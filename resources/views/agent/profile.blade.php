<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('plugins/bootstrap-4.4.1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link href="{{ asset('css/agent.css') }}" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>

    <title>Perfil de usuario</title>

  </head>
  <body onload="changeId()">
    
@include('agent.partials.menu')
  
  <div class="main-content">
    @include('flash::message')

    <div class="card shadow-lg p-3 mb-5 rounded" style="background-image: linear-gradient(to top, #6681c0, #5777c4, #476dc8, #3762cb, #2457cd);">
        
        <div class="card-title"><h2 style="color: white"><i class="fas fa-user-edit navIcon" style="font-size: 120%; color: white"></i>  Agente: {{ $user['name']. ' ' .$user['lastName'] }}</h2></div>

        <div class="card-body">
            
            <div class="row">
                            
              <div class="col-md-1"></div>  
                <div class="col-md-7">

                  <form method="POST" action="{{ action('AgentController@updateAgent') }}" style="padding-top: 5%" enctype="multipart/form-data">
                    @csrf <!-- {{ csrf_field() }} -->
                    <div class="mb-3">
                      <label for="inputEmail" class="form-label" style="color: white">Correo electronico</label>
                      <input class="form-control" name="inputEmail" value="{{ $user['email'] }}" type="email" id="inputEmail">
                      <input class="form-control" name="inputId" value="{{ $user['userId'] }}" type="text" id="inputId" hidden>
                    </div>
                    <div class="mb-3">
                      <label for="inputName" class="form-label" style="color: white">Nombre</label>
                      <input class="form-control" name="inputName" value="{{ $user['name'] }}" type="text" id="inputName" required>
                    </div>
                    <div class="mb-3">
                      <label for="inputLastName" class="form-label" style="color: white">Apellido</label>
                      <input class="form-control" name="inputLastName" value="{{ $user['lastName'] }}" type="text" id="inputLastName" required>
                    </div>
                    <div class="mb-3">
                      <label for="inputPhone" class="form-label" style="color: white">Telefono de contacto</label>
                      <input class="form-control" name="inputPhone" value="{{ $user['phoneNumber'] }}" type="number" id="inputPhone" required>
                    </div>
                    
                    <button type="submit" class="btn btn-dark" style="font-size: 220%" title="Guardar"><i class="far fa-save" ></i></button>   
                  </form>

                </div>                
                <div class="col-md-4">                    

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