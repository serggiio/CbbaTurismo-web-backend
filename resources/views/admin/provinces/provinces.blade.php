
<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>@yield('Panel de control')</title>



<!-- Bootstrap core CSS -->
<link href="{{ asset('plugins/bootstrap-4.4.1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- Link Swipers CSS -->
<link rel="stylesheet" href="{{ asset('plugins/swiper-master/package/css/swiper.min.css')}}">
<!-- Link font awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

<meta name="theme-color" content="#563d7c">


<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  </head>

    <body class="">
    
        @include('admin.partials.panelFixed')


          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                  <a href="#" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#galleryModal">Nuevo</a>
                </div>
              </div>
            </div>

  
            <h2>Lista de provincias registradas: </h2>
            <small id="emailHelp" class="form-text text-muted">Si se elimina una provincia y este tiene lugares o eventos registrados, estos tambien seran eliminados.</small>
            <br>
            <table class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de registro</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  
                    @foreach($provinces as $province)
                    <tr>
                        
                        <th scope="row">{{$province['provinceId']}}</th>
                        <td>{{$province['provinceName']}}</td>
                        <td>{{$province['created_at']}}</td>
                        <td>
                            <a class="nav-link" href="{{ route('front.provinceDetail', $province['provinceId'])}}">   
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="nav-link" href="{{ route('admin.province.destroy', $province['provinceId'])}}" onclick="return confirm('Se eliminaran tambien los lugares o eventos')">   
                                Eliminar
                            </a>
                        </td>
                      </tr>
                    @endforeach
                    

                </tbody>
              </table>


            	<div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  {!! $provinces->render() !!}
                </div>
                <div class="col-md-4"></div>
              </div>

              @include('admin.provinces.createProvince')

          </main>



    </body>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- Swiper JS -->
  <script src="{{ asset('plugins/swiper-master/package/js/swiper.min.js')}}"></script>

  <!-- Maps -->
  <script src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyAjvZCNzSUdg6g5jrOWYodqPLORdJdhsfM"></script>

  <script>
    var lat = -17.3783261;
    var lon = -66.1521979;
    //default Cbba map position
    var latlon = new google.maps.LatLng(lat, lon)
    var mapholder = document.getElementById('mapholder')
    mapholder.style.height = '400px';
    mapholder.style.width = '500px';

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
            
            let selectLocation = new google.maps.LatLng(valueJson.latitude, valueJson.longitude);
            map.setCenter(selectLocation);

        }
</script>
</html>
