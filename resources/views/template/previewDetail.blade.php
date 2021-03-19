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

                <div class="card-title"><h2 style="color: green;"> 
                    

                    <img src="{{ asset('images/places/' . $place->touristicPlaceId . '/' . $place->mainImage) }}" width="100px" height="100px" style="border-radius: 35px;float: left;margin-right:15px;margin-bottom:15px;">
                        {{ $place['placeName'] }}                                        
                        @php
                            echo "<br>";
                            for ($x = 0; $x <= $place['rateAvg']; $x++) {
                                echo '<i class="icon-star info" style="color: yellow"></i>';
                            }
                        @endphp

                    

                    </h2>  <br>                                      
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: white">
                      <li class="breadcrumb-item"><a href="{{route('welcome')}}">Inicio</a></li>
                      <li class="breadcrumb-item"><a href="{{route('welcome.previewList')}}">Vista previa</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ $place['placeName'] }}</li>
                    </ol>
                </nav>
                    <hr>
                    <div class="card-body">
                                                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row" style=" margin-left: 5%;margin-right: 5%;">
                                    <h3 class="card-title">Dirección</h3><hr>
                                    <div class="overflow-auto card" style="height: 100px;padding: 30px">{{ $place['streets'] }}</div>
                                </div>
                                <div class="row" style=" margin-left: 5%;margin-right: 5%;">
                                    <h3 class="card-title" style="width: 90%">Historia</h3><hr>
                                    <div class="overflow-auto card" style="height: 200px; padding: 30px">{{ $place['history'] }}</div>
                                </div>
                            </div>
                                
                            <div class="col-md-6 text-center">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="icon-map"></i></button>
                                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="icon-picture"></i></button>                                      
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="mapHolder" id="mapholder"></div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                        <div id="gallery" class="gallery" itemscope itemtype="http://schema.org/ImageGallery"> 
                                            <div class="row">
                                                @foreach ($place['gallery'] as $gallery)
                                                    @foreach ($gallery['images'] as $image)
                                                        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="col-md-4 card">
                                                            <a class="photoBtn" href="{{ asset($gallery['galleryPath'] . '/' . $image['imagePath']) }}" data-caption="Fjadrarglufur canyon, south shore<br><em class='text-muted'>© Jeff Sheldon</em>" data-width="1200" data-height="900" itemprop="contentUrl">
                                                                <img src="{{ asset($gallery['galleryPath'] . '/' . $image['imagePath']) }}" itemprop="thumbnail" alt="Image description" style="width: 100%; height: 300px;">
                                                            </a>
                                                        </figure>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="pswp__bg"></div>
                                            <div class="pswp__scroll-wrap">
                                              <div class="pswp__container">
                                                <div class="pswp__item"></div>
                                                <div class="pswp__item"></div>
                                                <div class="pswp__item"></div>
                                              </div>
                            
                                              <div class="pswp__ui pswp__ui--hidden">
                                                <div class="pswp__top-bar">
                            
                                                  <div class="pswp__counter"></div>
                                                  <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                                  <button class="pswp__button pswp__button--share" title="Share"></button>
                                                  <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                                  <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                            
                                                  <div class="pswp__preloader">
                                                    <div class="pswp__preloader__icn">
                                                      <div class="pswp__preloader__cut">
                                                        <div class="pswp__preloader__donut"></div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                  <div class="pswp__share-tooltip"></div>
                                                </div>
                                                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                                </button>
                                                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                                </button>
                                                <div class="pswp__caption">
                                                  <div class="pswp__caption__center"></div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>


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

        let formLatitude = "<?php echo $place['latitude']; ?>";
        let formLongitude = "<?php echo $place['longitude']; ?>";

        if(parseFloat(formLatitude) !== 0 && parseFloat(formLongitude) !== 0){
            //add marker
            var marker = new google.maps.Marker(
                {
                    position:new google.maps.LatLng(formLatitude, formLongitude),
                    map:map,
                    map: map,position:  new google.maps.LatLng(formLatitude, formLongitude)
                }
            );
            map.setCenter(new google.maps.LatLng(formLatitude, formLongitude));
        }
     
    </script>   

    <script defer>
        (function($) {
    
            // Init empty gallery array
            var container = [];
          
            // Loop over gallery items and push it to the array
            $('#gallery').find('figure').each(function() {
              var $link = $(this).find('a'),
                item = {
                  src: $link.attr('href'),
                  w: $link.data('width'),
                  h: $link.data('height'),
                  title: $link.data('caption')
                };
              container.push(item);
            });
          
            // Define click event on gallery item
            $('.photoBtn').click(function(event) {
          
              // Prevent location change
              event.preventDefault();
          
              // Define object and gallery options
              var $pswp = $('.pswp')[0],
                options = {
                  index: $(this).parent('figure').index(),
              bgOpacity: 0.8,
              captionEl: false,
              tapToClose: true,
              shareEl: false,
              fullscreenEl: false,
                };
          
              // Initialize PhotoSwipe
              var gallery = new PhotoSwipe($pswp, PhotoSwipeUI_Default, container, options);
              gallery.init();
            });
          
          }(jQuery));
    </script>



</html>