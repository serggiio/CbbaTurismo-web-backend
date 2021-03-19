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
        
        <div class="card-title"><h2 style="color: green"><i class="fas fa-user navIcon" style="font-size: 120%; color: green"></i>  Nuevo usuario</h2></div>
        <hr>
        <div class="card-body">
            
            <div class="row col-md-8">
                
              <form method="POST" action="{{ action('FrontController@saveNewUser') }}" enctype="multipart/form-data">
                @csrf <!-- {{ csrf_field() }} -->

                  <div class="form-group">
                    <label for="inputUserName">Nombre</label>
                    <input class="form-control" required name="inputUserName" type="text" id="inputUserName">
                  </div>

                  <div class="form-group">
                      <label for="inputUserLastName">Apellido</label>
                      <input class="form-control" required name="inputUserLastName" type="text" id="inputUserLastName">
                  </div>

                  <div class="form-group">
                      <label for="inputUserEmail">Correo</label>
                      <input class="form-control" required name="inputUserEmail" type="email" id="inputUserEmail">
                  </div>

                  <div class="form-group">
                      <label for="inputUserPassword">Contraseña</label>
                      <input class="form-control" required name="inputUserPassword" type="password" id="inputUserPassword">
                  </div>


                  <div class="row">
                      <div class="col-md-6">
                          <label for="inputUserType">Rol</label>
                          <select onchange="selectListener()" class="form-control select-province" required="" id="inputUserType" name="inputUserType">
                              @foreach($userTypes as $userType)
                                  <option value="{{$userType['increments']}}">{{$userType['nameType']}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>

                  

                  

                  
                      <br>
                      <button type="submit" class="btn btn-primary">Registrar Usuario!</button>
                  
              </form>

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