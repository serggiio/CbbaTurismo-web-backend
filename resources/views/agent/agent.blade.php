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

    <title>Agente</title>

    <style>
        
    </style>
  </head>
  <body>
    

@include('agent.partials.menu')

  <div class="main-content">
    
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
        
        <div class="card-title"><h2 style="color: green"><i class="fas fa-home navIcon" style="font-size: 120%; color: green"></i>  Menu principal</h2></div>
        <hr>
        <div class="card-body">
            
            <div class="row">
                <div class="col-md-5">

                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Provincia</th>
                            <th scope="col">Estado</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach($places as $index => $touristicPlace)
                                <tr>                                    
                                    <th scope="row">{{$index +1}}</th>
                                    <td>{{$touristicPlace['placeName']}}</td>
                                    <td>{{$touristicPlace['provinceName']}}</td>
                                    <td>{{$touristicPlace['statusName']}}</td>
                                    <td><button type="button" onclick="updateMap({{ $touristicPlace }})" value="{{ $touristicPlace }}" class="btn btn-outline-success"><i class="fas fa-map-marker-alt"></i></button></td>                             
                                </tr>
                            @endforeach
                          
                        </tbody>
                      </table>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">

                    <div class="mapHolder" id="mapholder"></div>

                </div>
                <div class="col-md-1"></div>
            </div>
            
        </div>

    </div>
    
    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
        <div class="card-title"><h2 style="color: green"><i class="fas fa-eye navIcon" style="font-size: 120%; color: green"></i>  Vista rápida</h2></div>
        <hr>
        <div class="card-body">
            <div class="row">

                @foreach ($places as $item)
                
                    <div class="col-md-4" style="color: aliceblue">
                        <div class="card mb-3 shadow-lg p-3 mb-5  " style="width: 100%;border-radius: 25px; background-image: linear-gradient(to right top, #1a2320, #194e3b, #0f7d52, #16ad63, #3ae06d);">
                            <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('images/places/' . $item->touristicPlaceId . '/' . $item->mainImage) }}" width="100%" height="100%" style="border-radius: 25px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                <h5 class="card-title">{{ $item['placeName'] }}</h5>
                                <p class="card-text">
                                    <p class="card-text viewText">Puntuación: <span class="badge rounded-pill bg-warning text-white">{{ $item['rateAvg'] }}</span></p>
                                    <p class="card-text viewText">Comentarios: <span class="badge rounded-pill bg-dark text-white">{{ $item['commentaryCount'] }}</span></p>
                                    <p class="card-text viewText">Galerías: <span class="badge rounded-pill bg-info  text-white">{{ $item['galleryCount'] }}</span></p>
                                    <p class="card-text viewText">Guardados: <span class="badge rounded-pill bg-primary text-white">{{ $item['favoriteCount'] }}</span></p>
                                    <p class="card-text viewText"><a href="{{route('frontAgent.placeDetail', $item['touristicPlaceId'])}}" type="button" class="btn btn-dark"><i class="fas fa-edit"></i></a></span></p>
                                </p>
                                <p class="card-text"><small class="text-white">Registro: {{ $item['created_at'] }}</small></p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
 
                
                

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

            function updateMap(place){
                console.log(place);
                //alert(place.touristicPlaceId);
                var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
                var latlon = new google.maps.LatLng(place.latitude, place.longitude);
                var marker = new google.maps.Marker({position:latlon,map:map,title:"TU UBICACION ACTUAL"});
                map.setCenter(latlon);

                const infowindow = new google.maps.InfoWindow({
                    content: place.placeName,
                });

                marker.addListener("click", () => {
                    infowindow.open(map, marker);
                });
            }
     
    </script>

</html>