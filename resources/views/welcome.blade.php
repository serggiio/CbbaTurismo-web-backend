@extends('partials.template')

@section('content')

    <div class="row divImage">

        <nav class="navbar">
            <a href="{{route('welcome')}}" class="navLink"><i class="fas fa-home navIcon"></i><span class="nav-label btn navButton">Inicio</span></a>
            <a href="{{route('welcome.previewList')}}" class="navLink"><i class="fas fa-tree navIcon"></i><span class="nav-label btn navButton">Turismo</span></a>
            <a data-bs-toggle="modal" data-bs-target="#contactModal" class="navLink"><i class="fas fa-phone-volume navIcon"></i><span class="nav-label btn navButton">Contacto</span></a>        
            @if (Auth::check())
                <a href="{{route('front.index')}}" class="navLink"><i class="icon-screen-desktop white"></i><span class="nav-label btn navButton">Panel</span></a>
            @else
                <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="navLink"><i class="fas fa-sign-in-alt white navIcon"></i><span class="nav-label btn navButton">Sign in</span></a>
            @endif
        </nav>
        
        <div class="blockMessage">
            <div class="divBorder"></div>
            <p class="text1">Explora</p>
            <p class="text2">destinos turisticos</p>

        </div>

        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/header/header1.jpg') }}" alt="" class="imageCarousel">
                    <div class="container">
                        <div class="carousel-caption text-left">

                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('images/header/header5.jpg') }}" alt="" class="imageCarousel">
                    <div class="container">
                        <div class="carousel-caption text-left">

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/header/header4.jpg') }}" alt="" class="imageCarousel">
                    <div class="container">
                        <div class="carousel-caption text-left">

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('images/header/header4.jpg') }}" alt="" class="imageCarousel">
                  <div class="container">
                      <div class="carousel-caption text-left">

                      </div>
                  </div>
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/header/header5.jpg') }}" alt="" class="imageCarousel">
                <div class="container">
                    <div class="carousel-caption text-left">

                    </div>
                </div>
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"  data-bs-slide="prev">
                <i class="fas fa-arrow-circle-left" style="font-size: 420%; color: black"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"  data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="rightNav">
            <img src="{{ asset('images/header/icono4.png') }}" alt="" class="mainIcon">    
            <p class="navText">Descrube los mejores destinos turisticos con información que se actualiza constantemente para una
                mejor expericencia.
                <br><br>
                
                <a class="btn btn-outline-info previewButton" href="{{route('welcome.previewList')}}">Vista previa</a><br>
                App Android <a href="{{ asset('androidApp/CbbaTurismo-App.apk') }}" class="btn btn-outline-info previewButton"><i class="fab fa-android" style="font-size: 150%"></i></a><br>
            
            </p>
            <br>
            <p class="navDot">..........................................................
                ..........................................................
                ..........................................................
                    
                
            </p>
        </div>

        
    </div>
    @include('template.partials.loginForm')
    @include('template.partials.contactForm')
@endsection