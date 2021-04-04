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

  <div class="main-content">
        <div class="row">
            <div class="col-md-12 shadow-lg bg-body rounded" style="width: fit-content">                

                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/header/header1.jpg') }}" alt="" class="imageCarousel">
                            <div class="container">
                                <div class="carousel-caption text-left">
                                  <h1>Cochabamba turistica</h1>
                                  <p>Conoce nuevos lugares, explora la diversa gastronomia, comparte cultura con la diversa gente</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <img src="{{ asset('images/header/header3.jpg') }}" alt="" class="imageCarousel">
                            <div class="container">
                                <div class="carousel-caption text-left">
                                  <h1>Cochabamba turistica</h1>
                                  <p>Conoce nuevos lugares, explora la diversa gastronomia, cultura y gente</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/header/header2.jpg') }}" alt="" class="imageCarousel">
                            <div class="container">
                                <div class="carousel-caption text-left">
                                  <h1>Cochabamba turistica</h1>
                                  <p>Conoce nuevos lugares, explora la diversa gastronomia, cultura y gente</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                          <img src="{{ asset('images/header/header4.jpg') }}" alt="" class="imageCarousel">
                          <div class="container">
                              <div class="carousel-caption text-left">
                                <h1>Cochabamba turistica</h1>
                                <p>Conoce nuevos lugares, explora la diversa gastronomia, cultura y gente</p>
                              </div>
                          </div>
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('images/header/header5.jpg') }}" alt="" class="imageCarousel">
                        <div class="container">
                            <div class="carousel-caption text-left">
                              <h1>Cochabamba turistica</h1>
                              <p>Conoce nuevos lugares, explora la diversa gastronomia, cultura y gente</p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"  data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"  data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>            

        </div>
        <br>

        <div class="row">

            <div class="text-center bg">
                <div class="col-md-7 p-lg-5 mx-auto my-9">
                  <h1 class="display-4 font-weight-normal">Explora destinos turisticos</h1>
                  <p class="lead font-weight-normal">Descrube los mejores destinos turisticos con información que se actualiza constantemente para una mejor expericencia</p>
                  <a class="btn btn-outline-secondary" href="{{route('welcome.previewList')}}">Vista previa</a>
                </div>
                <div class="product-device shadow-sm d-none d-md-block"></div>
                <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
              </div>

        </div>
<br><br>
        <div class="row">
            
            <div class="col-md-4" style="padding: 20px;">
                <div class="card text-center">
                    <div class="card-content card1" id="card1" style="">
                        <div class="card-body pt-0">
                            <img src="{{ asset('images/appDemo/demo0_opt.jpg') }}" width="40%" height="300px" class="float-right" style="border-top: 0;">
                            <h1 class="card-title mt-3">APP ANDROID</h1>
                            <p class="card-text">Descarga la aplicación y explora por medio de rutas el atractivo turistico</p>
                            <a href="{{ asset('androidApp/CbbaTurismo.apk') }}" class="btn btn-success"><i class="fab fa-android" style="font-size: 150%"></i></a><br>
                            <a href=""><img src="{{ asset('images/header/icono4.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-8" style="padding: 20px">
                <!-- Swiper -->
                <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($places as $place)
                        <div class="swiper-slide"> 
                            <div class="card" style="height: fit-content;" id="card2">
                                <div class="card-content">
                                    <a href="{{route('welcome.previewDetail', $place->touristicPlaceId)}}">
                                        <img height="300px" src="{{ asset('images/places/' . $place->touristicPlaceId . '/' . $place->mainImage) }}" alt="" width="100%">                                        
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $place['placeName'] }}</h4>
                                        <p class="card-text">{{ $place['streets'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Pagination -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                </div>
            </div>
            <hr>
        </div>
        
        
        <div class="row">            
            
            <div class="container">
                <div class="row">
                  <div class="col-sm-12 col-sm-offset-2 card">
              
                    <div class="card-header text-center">
                        <h4 class="card-title">Imagenes recientes</h4>
                    </div>
              
                    <!-- Galley wrapper that contains all items -->
                    <div id="gallery" class="gallery" itemscope itemtype="http://schema.org/ImageGallery">              

                        <div class="row">
                            @foreach ($images as $image)                                                            
                                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="col-md-4 card">
                                    <a class="photoBtn" href="{{ asset($image['gallery']['galleryPath'] . '/' . $image['imagePath']) }}" data-caption="Fjadrarglufur canyon, south shore<br><em class='text-muted'>© Jeff Sheldon</em>" data-width="1200" data-height="900" itemprop="contentUrl">
                                        <img src="{{ asset($image['gallery']['galleryPath'] . '/' . $image['imagePath']) }}" itemprop="thumbnail" alt="Image description" style="width: 100%; height: 300px;">
                                    </a>
                                </figure>
                            @endforeach
                        </div>                        
              
                        
                    </div>
              
                  </div>
                </div>
              </div>
              
              
              <div class="spacer"></div>              
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