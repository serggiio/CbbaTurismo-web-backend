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

      <div class="col-md-2">
          <div class="card  bg-primary shadow-lg  bg-body rounded" >
              <div class="card-content">
              <a href="#" data-bs-toggle="modal" data-bs-target="#provinceModal">
                  <div class="card-body">
                  <div class="media d-flex">
                      <div class="align-self-center">
                      <i class="fas fa-plus-circle white font-large-2 float-left"></i>
                      </div>
                      <div class="media-body white text-center">
                      <h3>Nueva</h3>
                      <span>Provincia</span>
                      </div>
                  </div>
                  </div>
              </a>
              </div>
          </div>
      </div>

    </div>

    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
        
        <div class="card-title"><h2 style="color: green"><i class="fas fa-flag navIcon" style="font-size: 120%; color: green"></i>  Provincias</h2></div>
        <hr>
        <small id="emailHelp" class="form-text text-muted">Si se elimina una provincia y tiene lugares turísticos o eventos, estos tambiens eran eliminados </small>
        <div class="card-body">
            
            <div class="row">
                <table class="table table-hover" id="listTable">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Fecha de registro</th>
                          <th scope="col">Editar</th>
                          <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>                      

                        @foreach($provinces as $index => $province)
                          <tr>
                            
                            <th scope="row">{{$index+1}}</th>
                            <td>{{$province['provinceName']}}</td>
                            <td>{{$province['created_at']}}</td>
                            <td>
                                <a class="nav-link" href="{{ route('front.provinceDetail', $province['provinceId'])}}" style="width: fit-content">   
                                  <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a class="nav-link" href="{{ route('admin.province.destroy', $province['provinceId'])}}" onclick="return confirm('Se eliminaran tambien los lugares o eventos')" style="width: fit-content">   
                                  <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                          </tr>
                        @endforeach

                    </tbody>
                </table>

                @include('admin.provinces.createProvince')

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

    <script>

      var lat = -17.3783261;
      var lon = -66.1521979;
      //default Cbba map position
      var latlon = new google.maps.LatLng(lat, lon)
      var mapholder = document.getElementById('mapholder')
      //mapholder.style.height = '400px';
      //mapholder.style.width = '500px';
  
      var myOptions = {
          center:latlon,
          zoom:12,
          mapTypeId:google.maps.MapTypeId.ROADMAP,
          mapTypeControl:false,
          navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
      }
      
          var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
          //var marker = new google.maps.Marker({position:latlon,map:map,title:"TU UBICACION ACTUAL"});
          
          let infoWindow = new google.maps.InfoWindow({
              content: "Click en el mapa para obtener su localización!",
              position: latlon,
          });

          infoWindow.open(map);

          map.addListener("click", (mapsMouseEvent) => {

              infoWindow.close();
              let clickPosition = mapsMouseEvent.latLng.toJSON();

              infoWindow = new google.maps.InfoWindow({
                  position: mapsMouseEvent.latLng,
                  });
                  infoWindow.setContent(
                  'Coordenadas: <br/>'+ clickPosition.lat + ' <br/>' + clickPosition.lng
                  );
                  infoWindow.open(map);

                  //readonly inputs
                  var inputLat = document.getElementById("inputPlaceLatitude"); 
                  inputLat.value = '' + clickPosition.lat;

                  var inputLon = document.getElementById("inputPlaceLongitude"); 
                  inputLon.value = '' + clickPosition.lng;

          });
      
          
      //select province item listener event
      function selectListener(){
          let select = document.getElementById("inputPlaceProvince");
          let valueJson = JSON.parse(select.value);
          //alert('la concha de la lora' + valueJson.latitude);
          
          let selectLocation = new google.maps.LatLng(valueJson.latitude, valueJson.longitude);
          map.setCenter(selectLocation);

      }

      var uploadField = document.getElementById("image");

      uploadField.onchange = function() {
         console.log('tamaño: ' + this.files[0].size); 
          /*if(this.files[0].size > 41982){
            alert("El tamaño de la imagen es muy grande!");
            this.value = "";
          }*/

          /*let img = new Image()
          img.src = window.URL.createObjectURL(this.files[0])
          img.onload = () => {
            alert(img.width + " " + img.height);
          }*/
      };

      
  </script>
</html>