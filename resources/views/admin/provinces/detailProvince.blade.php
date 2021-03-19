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
        
        <div class="card-title"><h2 style="color: green"><i class="fas fa-flag navIcon" style="font-size: 120%; color: green"></i>  {{ $province['provinceName'] }}</h2></div>
        <hr>
        <div class="card-body">
            
            <div class="row">
                <form method="POST" action="{{ action('FrontController@saveUpdatedProvince') }}" enctype="multipart/form-data">
                    @csrf <!-- {{ csrf_field() }} -->

                    <div class="form-group col-md-6">
                        <label for="tagName">Fecha de creación: </label>
                        <input class="form-control" required name="created_at" type="text" id="created_at" readonly value="{{ $province['created_at'] }}">                            
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="tagName">Nombre</label>
                        <input class="form-control" required name="provinceName" type="text" id="provinceName" value="{{ $province['provinceName'] }}">
                        <input class="form-control" required name="provinceId" type="text" id="provinceId" value="{{ $province['provinceId'] }}" hidden>
                    </div>

                    <div class="col-md-6">
                        <div class="card" style="border-radius: 25px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2); padding-left: 8%;padding-right: 8%">
                            <br><br>
                            <div class="mapHolder" id="mapholder"></div><br>                                                          
                        </div>
                    </div>
                    <div class="form-group col-md-6"><br>
                                
                        <input class="form-control" name="inputPlaceLatitude" value="{{ $province['latitude'] }}" type="text" id="inputPlaceLatitude" readonly>
                        <input class="form-control" name="inputPlaceLongitude" value="{{ $province['longitude'] }}" type="text" id="inputPlaceLongitude" readonly>
                    </div>

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

            let formLatitude = document.getElementById("inputPlaceLatitude").value;
            let formLongitude = document.getElementById("inputPlaceLongitude").value;

            if(parseFloat(formLatitude) !== 0 && parseFloat(formLongitude) !== 0){
                //add marker
                var marker = new google.maps.Marker(
                    {
                        position:new google.maps.LatLng(formLatitude, formLongitude),
                        map:map,
                        title:"",
                        map: map,position:  new google.maps.LatLng(formLatitude, formLongitude)
                    }
                );
                map.setCenter(new google.maps.LatLng(formLatitude, formLongitude));
            }else{
                infoWindow.open(map);
            }
     

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
                
                let selectLocation = new google.maps.LatLng(valueJson.latitude, valueJson.longitude);
                map.setCenter(selectLocation);

            }
    </script>

</html>