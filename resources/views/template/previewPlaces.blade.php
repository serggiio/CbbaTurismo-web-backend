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

<!-- Link Swipers CSS -->
<link rel="stylesheet" href="{{ asset('plugins/swiper-master/package/css/swiper.min.css')}}">

<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/photo-swipe.css') }}" rel="stylesheet">
    <link href="{{ asset('css/photo-default-skins.css') }}" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>

    <title>CBBA turísmo</title>

    <style>
        
    </style>
  </head>


  

  <body onload="collaspseBar()">

@include('template.partials.lateralNav')

  <div class="main-content" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12 shadow-lg bg-body rounded" style="width: fit-content; padding: 30px" >                

                <div class="card-title"><h2 style="color: green"><i class="fas fa-house-user navIcon" style="font-size: 120%; color: green"></i>  Vista previa turismo </h2></div>
                    <hr>

                    <div class="card-body">
                        
                        <div class="container">
                            <div class="row">
                              <div class="col-sm">
                                

                                <table id="listTable" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Provincia</th>
                                        <th scope="col">Ubicación</th>
                                        <th scope="col">Ver</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                        
                                        @foreach($places as $index => $touristicPlace)
                                            <tr>
                                                <td class="text-center"><img src="{{ asset('images/places/' . $touristicPlace->touristicPlaceId . '/' . $touristicPlace->mainImage) }}" width="50%" height="50px" style="border-radius: 35px;"></td>                                    
                                                <td>{{$touristicPlace['placeName']}}</td>
                                                <td>{{$touristicPlace['provinceName']}}</td>
                                                <td><button type="button" onclick="updateMap({{ $touristicPlace }})" value="{{ $touristicPlace }}" class="btn btn-outline-success"><i class="fas fa-map-marker-alt"></i></button></td>                             
                                                <td><a type="button" class="btn btn-outline-dark" href="{{route('welcome.previewDetail', $touristicPlace->touristicPlaceId)}}"><i class="fas fa-arrow-circle-right dark"></i></a></td>                             
                                            </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>

                              </div>
                              <div class="col-sm">
                                <div class="mapHolder" id="mapholder"></div>
                              </div>
                            </div>
                        </div>
                        
                        
                    </div>
                
            </div>            

        </div>
        <br>

        
        




  </div>
  @include('template.partials.loginForm')
  @include('template.partials.contactForm')

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

    <script>

        $('.colapseButton').click(function(e) {
            $('.navbar-primary').toggleClass('collapsed');
        });

        $(document).ready(function() {
            $('#listTable').DataTable( {
                "info":     false,
                
            } );
        } );

        function collaspseBar() {
            document.getElementById("colapseButton").click(); // Click on the checkbox
        }      


    </script>    
  
    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 0,
        centeredSlides: false,
        freeMode: true,
        autoplay: {
          delay: 2000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
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