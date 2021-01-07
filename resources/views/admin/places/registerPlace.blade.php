
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

<link rel="stylesheet" href="{{asset('plugins/trumbowig/ui/trumbowyg.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/chosen/chosen.css')}}">

<meta name="theme-color" content="#563d7c">


<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  </head>

    <body class="">
    
        @include('admin.partials.panelFixed')


          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <div class="btn-toolbar mb-2 mb-md-0">
                
              </div>
            </div>

  
            <h2>Registro de lugar turistico</h2>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form method="POST" action="{{ action('FrontController@saveNewPlace') }}" style="padding-top: 5%" enctype="multipart/form-data">
                      @csrf <!-- {{ csrf_field() }} -->

                        <div class="form-group">
                          <label for="inputPlaceName">Nombre</label>
                          <input class="form-control" required name="inputPlaceName" type="text" id="inputPlaceName">
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="inputPlaceType" id="inputPlaceType" value="place" checked>
                          <label class="form-check-label" for="Radios1">Lugar turistico</label><br>
                          <input class="form-check-input" type="radio" name="inputPlaceType" id="inputPlaceType" value="event">
                          <label class="form-check-label" for="Radios2">Evento</label>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputPlaceProvince">Provincia</label>
                                <select onchange="selectListener()" class="form-control select-province" required="" id="inputPlaceProvince" name="inputPlaceProvince">
                                    @foreach($provinces as $province)
                                        <option value="{{$province}}">{{$province['provinceName']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPlaceTags">Tags</label>
                                <select class="form-control select-tag" multiple="multiple" required="required" name="inputPlaceTags[]">
                                    @foreach($tags as $tag)
                                        <option value="{{$tag['tagId']}}">{{$tag['tagName']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPlaceStreet">Calles</label>
                            <input class="form-control" name="inputPlaceStreet" type="text" id="inputPlaceStreet">
                        </div>

                        <div class="form-group">
                          <label for="image">Imagen</label>
                          <input id="image" type="file" name="image"><br>
                          <label for="img">Tamaño maximo 250 x 250</label>
                        </div>

                        <div class="form-group">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                  <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Descripción
                                      </button>
                                    </h5>
                                  </div>
                              
                                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <textarea class="form-control textarea-inputPlaceDescription" name="inputPlaceDescription" cols="50" rows="5" id="inputPlaceDescription"></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Historia
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <textarea class="form-control textarea-inputPlacehistory" name="inputPlacehistory" cols="50" rows="5" id="inputPlacehistory"></textarea>
                                    </div>
                                  </div>
                                </div>


                                <div class="card">
                                  <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Mapa
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div id="mapholder"></div><br>
                                                <div class="form-group">
                                                    
                                                    <input class="form-control" name="inputPlaceLatitude" type="text" id="inputPlaceLatitude" readonly>
                                                    <input class="form-control" name="inputPlaceLongitude" type="text" id="inputPlaceLongitude" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            
                        </div>

                        

                        
                            <br>
                            <button type="submit" class="btn btn-primary">Registrar Lugar!</button>
                        
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>





          </main>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script src="{{asset('plugins/jquery/js/jquery-3.3.1.js')}}"></script>    
    <script src="{{asset('plugins/trumbowig/trumbowyg.js')}}"></script>
    <script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>

    <!-- Maps -->
    <script src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyAjvZCNzSUdg6g5jrOWYodqPLORdJdhsfM"></script>


    <!-- Swiper JS -->
    <script src="{{ asset('plugins/swiper-master/package/js/swiper.min.js')}}"></script>
    <-- Import jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        

        <script>
            var map;
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 43.5293101, lng: -5.6773233},
                zoom: 20
                });
            }
        </script>

        <script>
            $.noConflict();
            $('.textarea-inputPlaceDescription').trumbowyg();
            $('.textarea-inputPlacehistory').trumbowyg();

            $('.select-province').chosen({
    
            });

            $('.select-tag').chosen({
                placeholder_text_multiple: "seleccione tags",
                search_contains: true,
                no_results_text: "No se encontraron tags"
            });
        </script>


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




    </body>

</html>
