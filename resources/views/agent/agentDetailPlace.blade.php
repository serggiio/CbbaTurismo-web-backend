<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('plugins/bootstrap-4.4.1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link href="{{ asset('css/agent.css') }}" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>

    <link rel="stylesheet" href="{{asset('plugins/trumbowig/ui/trumbowyg.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/chosen/chosen.css')}}">
    <title>Página agente</title>

</head>
<body onload="setDefaultCategories()">
    @include('agent.partials.menu')

    <div class="main-content">
        @include('flash::message')
    
        <div class="card shadow-lg p-3 mb-5 rounded" style="">
        
            <div class="card-title"><h2><i class="fas fa-place-of-worship" style="font-size: 120%;"></i> {{ $place['placeName']}}</h2></div>
    
            <div class="card-body">
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-home" style="font-size: 170%"></i></button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="map-tab" data-bs-toggle="tab" data-bs-target="#map" type="button" role="tab" aria-controls="map" aria-selected="false"><i class="fas fa-map-marked-alt" style="font-size: 170%"></i></button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery" aria-selected="false"><i class="far fa-images" style="font-size: 170%"></i></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="comment-tab" data-bs-toggle="tab" data-bs-target="#comment" type="button" role="tab" aria-controls="comment" aria-selected="false"><i class="far fa-comments" style="font-size: 170%"></i></button>
                      </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <form method="POST" action="{{ action('AgentController@saveUpdatedPlace') }}" style="padding-top: 5%" enctype="multipart/form-data">
                                    @csrf <!-- {{ csrf_field() }} -->

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                
                                                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);">
                                                    <img src="{{ asset('images/places/' . $place->touristicPlaceId . '/' . $place->mainImage) }}" width="100%" height="100%" style="border-radius: 25px; padding-left: 10%;padding-right: 10%; max-height: 400px">
                                                    <div class="container">
                                                    
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4"><br>
                                                <label for="mainImage">Cambiar imagen</label>
                                                <input id="image" type="file" name="image"><br>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="placeName">Nombre</label>
                                        <input class="form-control" required name="placeName" type="text" id="placeName" value="{{ $place['placeName'] }}">
                                        <input class="form-control" required name="touristicPlaceId" type="text" id="touristicPlaceId" value="{{ $place['touristicPlaceId'] }}" hidden>
                                    </div>                                                                                                    

                                    <div class="form-group">
                                        <label for="streets">Calles</label>
                                        <input class="form-control" name="streets" type="text" id="streets" value="{{ $place['streets'] }}">
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputPlaceProvince">Provincia</label>
                                            <select onchange="selectListener()" class="form-control select-province" required="" id="inputPlaceProvince" name="inputPlaceProvince">
                                                @foreach($provinces as $province)
                                                @if ($province['provinceId'] == $place['provinceId'])
                                                    <option value="{{$province}}" selected>{{$province['provinceName']}}</option>
                                                @else
                                                    <option value="{{$province}}">{{$province['provinceName']}}</option>
                                                @endif
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPlaceTags">Tags</label>
                                            <select class="form-control select-tag" multiple="multiple" required="required" name="inputPlaceTags[]" id="selectTagsitos">                                                    

                                                @foreach($tags as $tag)
                                                    @foreach ($place['tag'] as $item)
                                                        @if ($tag['tagId'] == $item['tagId'])
                                                            <option value="{{$tag['tagId']}}" selected>{{$tag['tagName']}}</option>
                                                            break;
                                                        @endif
                                                    @endforeach                                                                                                                
                                                @endforeach

                                                @foreach($tags as $tag)
                                                
                                                    <option value="{{$tag['tagId']}}">{{$tag['tagName']}}</option>
                                                                                                                                                                  
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputPlaceCategories">Categorias</label>
                                            <select class="form-control select-category" multiple="multiple" name="inputPlaceCategories[]" id="selectCategories">
                                                
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <br>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="statusRadio" id="activeRadio" value="2">
                                                <label class="form-check-label" for="activeRadio">
                                                  Activo
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="statusRadio" id="inactiveRadio" value="1">
                                                <label class="form-check-label" for="inactiveRadio">
                                                  Inactivo
                                                </label>
                                              </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                              Descripción
                                            </button>
                                          </h2>
                                          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                    <textarea class="form-control textarea-inputPlaceDescription" name="inputPlaceDescription" cols="50" rows="5" id="inputPlaceDescription">{{ $place['description'] }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                              Historia
                                            </button>
                                          </h2>
                                          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                    <textarea class="form-control textarea-inputPlacehistory" name="inputPlacehistory" cols="50" rows="5" id="inputPlacehistory">{{ $place['history'] }}</textarea>
                                                    </div>                                                                                
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                    <br>
                                    
                                                                    

                                    <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                                
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
                        
                        <div class="mapHolder" id="mapholder"></div><br>
                            <div class="form-group">
                                <br><br>
                                <input class="form-control" name="inputPlaceLatitude" value="{{ $place['latitude'] }}" type="text" id="inputPlaceLatitude" readonly>
                                <input class="form-control" name="inputPlaceLongitude" value="{{ $place['longitude'] }}" type="text" id="inputPlaceLongitude" readonly>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                        </form>
                    </div>


                    <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">

                        @if (empty($place['gallery'][0]))
                        <!--No gallery-->
                        <form method="POST" action="{{ action('FrontController@saveNewPlace') }}" style="padding-top: 5%" enctype="multipart/form-data">
                            @csrf <!-- {{ csrf_field() }} -->
                            
                        </form>
                    @else
                    <!--With gallery-->

                        <br>

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                
                                <div class="row" >
                                    @foreach ($place['gallery'] as $gallery)

                                    <div class="col-md-4">
                                        <div class="card" style="height: 300px; border-radius: 25px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2); background-image: linear-gradient(to top, #d8ffeb, #b8fad7, #97f5c3, #74efac, #49e995);">
                                            <div class="card-header">
                                                
                                                <div class="card-title"><h6>{{ $gallery["galleryName"] }}</h6></div>

                                            </div>
                                            <div class="card-body">
                                                <img width="100%" height="100%" src="{{ asset($gallery['galleryPath'] . '/' . $gallery['images'][0]['imagePath']) }}" class="">
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{route('frontAgent.galleryEdit', [$gallery->galleryId])}}" class="btn btn-outline-dark"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('frontAgent.galleryDestroy', $gallery->galleryId)}}" onclick="return confirm('Eliminar esta galeria?')" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                     @endforeach
                                </div>
                                
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                    @endif
                    <br>
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Crea una galería
                    </button>
                    @include('agent.agentCreateGallery')
                    

                    </div>



                    <div class="tab-pane fade" id="comment" role="tabpanel" aria-labelledby="comment-tab">

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10" style="align-items: center;">
                                <br><br>
                                
                                @foreach ($place['commentary'] as $commentaryItem)
                                    
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="nav-link btn btn-danger" href="{{ route('frontAgent.commentaryDestroy', $commentaryItem['commentaryId'])}}" onclick="return confirm('Eliminar este comentario?')">   
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="alert alert-primary" role="alert" style="margin-bottom: 0%">
                                                {{ $commentaryItem['commentaryDesc'] }}
                                            </div> 
                                            <div class="alert alert-dark" role="alert">
                                                Usuario: {{ $commentaryItem['user']['name'] . ' ' . $commentaryItem['user']['lastName']. ' ' . $commentaryItem['created_at'] }} 
                                            </div>
                                        </div>
                                        
                                    </div>                                    
                                    <hr>                                                             
                                @endforeach
                                
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                    </div>
                  </div>
                

            </div>        
    
        </div>
        
       
    
    </div>
    
</body>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="{{asset('plugins/jquery/js/jquery.js')}}"></script>
<!-- Maps -->
<script src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyAjvZCNzSUdg6g5jrOWYodqPLORdJdhsfM"></script>


<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="{{asset('plugins/jquery/js/jquery-3.3.1.js')}}"></script>    
<script src="{{asset('plugins/trumbowig/trumbowyg.js')}}"></script>
<script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>


<!-- Swiper JS -->
<script src="{{ asset('plugins/swiper-master/package/js/swiper.min.js')}}"></script>
<!-- Import jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>


  <script>$('.btn-expand-collapse').click(function(e) {
      $('.navbar-primary').toggleClass('collapsed');
      });

  </script>

  <script>

    function setDefaultCategories(){
        let savedTags = JSON.parse('<?php echo $place['tag']  ?>');
        let savedCategories = JSON.parse('<?php echo $place['category']  ?>');

        let categoriesArray = JSON.parse('<?php echo $categories  ?>'); 
        var select = document.getElementById("selectCategories");
        var length = select.options.length;
        
        for(i = 0; i < categoriesArray.length; i++){
            let option = document.createElement('option');
            option.appendChild( document.createTextNode(categoriesArray[i].categoryName) );
            option.value = categoriesArray[i].categoryId;
            //option.setAttribute('selected', 'selected');
            for(k = 0; k < savedCategories.length; k++) {
                if(categoriesArray[i].categoryId == savedCategories[k].categoryId) {
                    option.setAttribute('selected', 'selected');
                }
              }
            select.appendChild(option);
        }



        $('.select-category').trigger("chosen:updated");
        
        console.log(Array.from(select.options)[0].value);

        setStatus();

    }

    function setStatus(){
        let savedStatus = JSON.parse('<?php echo $place['placeStatusId']  ?>');
        //alert('ESTADO_ ' + savedStatus);
        let activeRadio = document.getElementById("activeRadio");
        let inactiveRadio = document.getElementById("inactiveRadio");

        if(savedStatus == 1){
            inactiveRadio.setAttribute("checked", "");
        }else if(savedStatus == 2){
            activeRadio.setAttribute("checked", "");
        }
    }

    var found = [];
    $("select option").each(function() {
    if($.inArray(this.value, found) != -1) $(this).remove();
    found.push(this.value);
    });


    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('mapHolder'), {
        center: {lat: 43.5293101, lng: -5.6773233},
        zoom: 20
        });

        
        
    }


    function updateData(gallery){
        let jsonData = gallery;
        console.log(jsonData);
        document.getElementById("galleryName").innerHTML = 'Galeria: ' + jsonData.galleryName;
        let resultString = '';
        for(let n in jsonData.images){
            console.log(jsonData.galleryPath);
            let tempString = '';
            tempString = '<div class="col-md-3"><div class="card" style="height: 80%"><img width="100%" height="100%" src="{{ asset('galleryPathCode' . "/"  . 'jsonData.images[n].imagePath') }}" class=""></div></div>'.replace('jsonData.images[n].imagePath', jsonData.images[n].imagePath).replace('galleryPathCode', jsonData.galleryPath);
            resultString += tempString
            
        }
        document.getElementById("detailId").innerHTML = resultString;
        //alert(jsonData.galleryId);
        //document.getElementById("detailId").innerHTML = "Hello <h2>{{ 'aaa' }}</h2>!"; 
    }
    
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

  <script>
    $.noConflict();
    $('.textarea-inputPlaceDescription').trumbowyg();
    $('.textarea-inputPlacehistory').trumbowyg();
    $('.history').trumbowyg();

    $('.select-province').chosen({

    });

    $('.select-tag').chosen({
        placeholder_text_multiple: "seleccione tags",
        search_contains: true,
        no_results_text: "No se encontraron tags"
    });

    $('.select-category').chosen({
        placeholder_text_multiple: "seleccione categorias",
        search_contains: true,
        no_results_text: "No se encontraron categorias"
    });
  </script>
</html>