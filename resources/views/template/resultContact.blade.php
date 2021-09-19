<!doctype html>
<html lang="en" style="height: 100%;">
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

<!-- Link Swipers CSS -->
<link rel="stylesheet" href="{{ asset('plugins/swiper-master/package/css/swiper.min.css')}}">

<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/photo-swipe.css') }}" rel="stylesheet">
    <link href="{{ asset('css/photo-default-skins.css') }}" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>

    <title>Contacto</title>

    <style>
        
    </style>
  </head>


  

  <body  style="height: 100%;width: 100% ;background-repeat: no-repeat; background-size: cover;background-image: url('{{asset('images/header/header1.jpg')}}')">

        <div class="card  bg-success" style="position: absolute; top: 10%; left: 30%; ">
          <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fas fa-check-circle white font-large-2 float-left"></i>
                  </div>
                  <div class="media-body white text-right">
                    <div class="card-body">
                      @if (empty($data))
                        <h5 class="card-title">Contacto</h5>
                        <p class="card-text">Llena el formulario de contacto para registrar tu comercio!</p>
                      @else
                        @if ($data['type'] == 'Error')
                          <h5 class="card-title">Ocurrio un eror con la ifnormación proporcionada.</h5>
                          <p class="card-text">El correo electronico proporcionado pertenece a otro tipo de cuenta.</p>
                          <p>Porfavor revisa la informacion y vuelve a intentarlo.</p>    
                        @else
                          <h5 class="card-title">Registro completo.</h5>
                          <p class="card-text">La informacion proporcionada para el correo: {{ $data['user']['email'] }} se creo correctamente.</p>
                          <p>Una ves aprobada la solicitud se enviara un correo de confirmación!</p>
                        @endif
                        
                      @endif
                      
                      <hr>
                      <a href="{{route('welcome')}}" class="btn btn-primary">Volver al inicio</a>
                    </div>
                  </div>
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
    <!-- Swiper JS -->
    <script src="{{ asset('plugins/swiper-master/package/js/swiper.min.js')}}"></script>

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('plugins/gallery/masonry.pkgd.min.js')}}"></script>
    <script src="{{ asset('plugins/gallery/photoswipe.min.js')}}"></script>
    <script src="{{ asset('plugins/gallery/photoswipe-ui-default.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('plugins/gallery/photoswipe-script.min.js')}}"></script>
    <!-- END: Page JS-->

    
  </body>
</html>