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
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
        
        <div class="card-title"><h2 style="color: green"><i class="fas fa-user navIcon" style="font-size: 120%; color: green"></i>  Usuario: {{ $user['name']. ' ' .$user['lastName'] }}</h2></div>
        <hr>
        <div class="card-body">
            
            <div class="row">
                <form method="POST" action="{{ action('FrontController@saveUpdatedUser') }}" style="padding-top: 5%" enctype="multipart/form-data">
                    @csrf <!-- {{ csrf_field() }} -->

                    <div class="form-group">                        
                        <label for="created_at">Fecha de registro: </label>
                        <input class="form-control" name="created_at" type="text" id="created_at" readonly value="{{ $user['created_at'] }}">
                        <input class="form-control" hidden name="userId" type="text" id="userId" readonly value="{{ $user['userId'] }}">
                    </div>

                    <div class="form-group">                        
                        <label for="name">Nombre</label>
                        <input class="form-control" name="name" type="text" id="name" value="{{ $user['name'] }}">
                    </div>

                    <div class="form-group">                        
                        <label for="lastName">Apellido</label>
                        <input class="form-control" name="lastName" type="text" id="lastName" value="{{ $user['lastName'] }}">
                    </div>

                    <div class="form-group">                        
                        <label for="email">Correo: </label>
                        <input class="form-control" name="email" type="text" id="email" value="{{ $user['email'] }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputUserType">Tipo de usuario</label>
                            <select class="form-control select-type" required="" id="inputUserType" name="inputUserType">
                               
                                @foreach($types as $type)
                                @if ($type['increments'] == $user['typeId'])
                                    <option value="{{$type['increments']}}" selected>{{$type['nameType']}}</option>
                                @else
                                    <option value="{{$type['increments']}}">{{$type['nameType']}}</option>
                                @endif
                                    
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="inputUserStatus">Estado: </label>
                            <select class="form-control select-status" required="" id="inputUserStatus" name="inputUserStatus">
                                @foreach($status as $status)
                                @if ($status['statusId'] == $user['statusId'])
                                    <option value="{{$status['statusId']}}" selected>{{$status['statusName']}}</option>
                                @else
                                    <option value="{{$status['statusId']}}">{{$status['statusName']}}</option>
                                @endif
                                    
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
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

    </script>

</html>