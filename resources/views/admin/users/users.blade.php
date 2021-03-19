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
              <a href="{{ route('front.newUser')}}">
                  <div class="card-body">
                  <div class="media d-flex">
                      <div class="align-self-center">
                      <i class="fas fa-plus-circle white font-large-2 float-left"></i>
                      </div>
                      <div class="media-body white text-center">
                      <h3>Nuevo</h3>
                      <span>Usuario</span>
                      </div>
                  </div>
                  </div>
              </a>
              </div>
          </div>
      </div>

    </div>
    
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
        
        <div class="card-title"><h2 style="color: green"><i class="fas fa-users navIcon" style="font-size: 120%; color: green"></i>  Usuarios</h2></div>
        <hr>
        <div class="card-body">
            
            <div class="row">
                <table class="table table-hover" id="listTable">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Correo</th>
                          <th scope="col">Tipo</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Editar</th>
                          <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>                      

                        @foreach($users as $index =>$user)
                          <tr>
                            
                            <th scope="row">{{$index+1}}</th>
                            <td>{{$user['name']. ' ' . $user['lastName']}}</td>
                            <td>{{$user['email']}}</td>
                            <td>{{$user['nameType']}}</td>
                            <td>{{$user['statusName']}}</td>
                            <td>
                                <a class="nav-link" href="{{ route('front.user.detail' , $user['userId'])}}" style="width: fit-content">   
                                  <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a class="nav-link" onclick="return confirm('Eliminar este usuario?')" href="{{ route('admin.user.destroy', $user['userId'])}}" style="width: fit-content">
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