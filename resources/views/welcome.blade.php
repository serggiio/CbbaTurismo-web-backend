@extends('template.layoutWelcome')

@section('content')
    <div class="row">


        <div class="col-6">
            <div class="card">
                <div class="card-body" style=""> 

            <div style="" class="jumbotron jumbotron-fluid">
                <div style="margin-left: 10%" class="container">
                  <h1 class="display-4">Descarga la aplicación <i class="fas fa-mobile-alt"></i></h1>
                  <p class="lead">Busca lugares turisticos en un solo lugar!</p>
                  <a href="{{ asset('androidApp/CbbaTurismo.apk') }}" class="btn btn-outline-success">App android</a>
                </div>
            </div>

                </div>
            </div> 
        </div>


       

        <div class="col-6">

            <div class="card">
                <div class="card-body" style=""> 

            <div style="padding: 0%" class="jumbotron jumbotron-fluid">
                <div class="container">
                  
                  
                  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active" style="margin-left: 25%">                                                
                        <h5>Menu Interactivo</h5>
                        <img style="width: 50%" class="d-block" src="{{ asset('images/appDemo/demo1.jpg') }}" alt="First slide">
                      </div>
                      <div class="carousel-item" style="margin-left: 25%">
                        <h5>Mapas</h5>
                        <img style="width: 50%" class="d-block" src="{{ asset('images/appDemo/demo2.jpg') }}" alt="First slide">
                        <div style="margin-left: 0%" class="carousel-caption d-none d-md-block">                            
                        </div>
                      </div>
                      <div class="carousel-item" style="margin-left: 25%">
                        <h5>Busquedas</h5>
                        <img style="width: 50%" class="d-block" src="{{ asset('images/appDemo/demo3.jpg') }}" alt="First slide">
                        <div style="margin-left: 0%" class="carousel-caption d-none d-md-block">                          
                        </div>
                      </div>
                      <div class="carousel-item" style="margin-left: 25%">
                        <h5>Detalles</h5>
                        <img style="width: 50%" class="d-block" src="{{ asset('images/appDemo/demo4.jpg') }}" alt="First slide">
                        <div style="margin-left: 0%" class="carousel-caption d-none d-md-block">                                                        
                        </div>
                      </div>
                      <div class="carousel-item" style="margin-left: 25%">
                        <h5>Rutas</h5>
                        <img style="width: 50%" class="d-block" src="{{ asset('images/appDemo/demo5.jpg') }}" alt="First slide">
                        <div style="margin-left: 0%" class="carousel-caption d-none d-md-block">                       
                        </div>
                      </div>
                      <div class="carousel-item" style="margin-left: 25%">
                        <h5>Galerias</h5>
                        <img style="width: 50%" class="d-block" src="{{ asset('images/appDemo/demo6.jpg') }}" alt="First slide">
                        <div style="margin-left: 0%" class="carousel-caption d-none d-md-block">
                        </div>
                      </div>
                      <div class="carousel-item" style="margin-left: 25%;">
                        <h5>Imagenes</h5>
                        <img style="width: 50%" class="d-block" src="{{ asset('images/appDemo/demo7.jpg') }}" alt="First slide">
                        <div style="margin-left: -10%" class="carousel-caption d-none d-md-block">                 
                        </div>
                      </div>
                    </div>
                    <a style="background: rgb(196, 195, 195)" class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a style="background: rgb(196, 195, 195)" class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>


                </div>
            </div>

                </div>
            </div> 

        </div>

            

    </div>
@endsection
