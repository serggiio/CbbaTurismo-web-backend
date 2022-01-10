<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link href="{{ asset('css/agent.css') }}" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>

    <title>404</title>

    <style>
        
    </style>
  </head>
  <body style="height: 100vh;width: 100% ;background-repeat: no-repeat; background-size: cover;background-image: url('{{asset('images/header/header1.jpg')}}')">

    

    
    <div style="left: 40%; z-index: 10; position: absolute; color: white; font-size: 200px; font-family: 'Courier New', Courier, monospace">
      404
    </div>   


    <div class="card mb-3" style="width: 20%; top: 30%; margin-left: auto; margin-right: auto">
      <div class="row">
        <div class="col-md-12">
          <div class="card-body" style="text-align: center; font-size: larger">
            <h5 class="card-title"><i class="fas fa-exclamation-triangle"></i> Página no encontrada</h5>
            <p class="card-text">
              La página que buscas no esta disponible 
              o no existe. <br>
              Porfavor revisa la información y vuelve a intentarlo.
            </p>
            <p class="card-text">
                <a class="btn btn-success" href="{{route('front.index')}}"><i class="fas fa-home"></i></a>
            </p>
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